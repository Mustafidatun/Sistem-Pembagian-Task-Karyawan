<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaryawanModel;
use Phpml\FeatureExtraction\TfIdfTransformer;

//baru php-nlp-tools 
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;

class Task extends Controller
{
    public function __construct(){   
        $this->task_model = new \App\Models\TaskModel();
        $this->totalIDF   = 0;
    }  

    public function pembagian_task2(){
        $this->Classification();
    }

    public function pembagian_task()
    {
        $vaHasilPresprocessing = array();
        $task = $this->task_model->ambilDataTaskLama();
        $taskBaru = $this->task_model->ambilDataTaskBaru();

        //proses Preprocessing Task Lama
        foreach($task as $dataTask){
            $idTask    = $dataTask->id_task;
            $deskripsi = $dataTask->deskripsi_task;
            $divisi    = $dataTask->id_divisi;

            $hasilPreprocessing = $this->prosesPreprocessing($deskripsi);

            $vaHasilPresprocessing[] = [
                'idTask'=>$idTask,
                'deskripsi'=>$hasilPreprocessing,
                'divisi'=>$divisi,
            ];
        }

        foreach($taskBaru as $dataTaskBaru){
            $idTaskBaru    = $dataTaskBaru->id_task;
            $deskripsiBaru = $dataTaskBaru->deskripsi_task;

            $hasilPreprocessingTaskBaru = $this->prosesPreprocessing($deskripsiBaru);

            $vaHasilPresprocessingTaskBaru[] = [
                'idTask'=>$idTaskBaru,
                'deskripsi'=>$hasilPreprocessingTaskBaru,
            ];
        }

        // proses TF-IDF
        $hasilTFIDF = $this->hitungTFIDF($vaHasilPresprocessing);

        // proses Multinomial Naive Bayes
        $hasilMultinomialNB = $this->hitungMultinomialNB($hasilTFIDF,$vaHasilPresprocessingTaskBaru);

        // echo "hasilMultinomialNB " . $hasilMultinomialNB;
    }

    public function hitungTFIDF($dataTask){
        $vaHitungTF = array();
        $vaHitungDF = array();
        $vaHitungIDF= array();
        $vaHitungTFIDF = array();
        $vaHasilHitungTFIDF = array();
        $jumlahTask= count($dataTask);

        foreach($dataTask as $task){
            $idTask    = $task['idTask'];
            $deskripsi = $task['deskripsi'];
            $divisi    = $task['divisi'];
            $hitungTF  = array_count_values($deskripsi);
            $vaHitungTF[] = $hitungTF;

            foreach($hitungTF as $kata => $value){
                if (key_exists($kata, $vaHitungDF)){
                    $jumlahKataDFSebelumnya = $vaHitungDF[$kata];
                    $jumlahKata = $value + $jumlahKataDFSebelumnya;
                    $vaHitungDF[$kata] = $jumlahKata;
                }else{
                    $vaHitungDF[$kata] = $value;
                }
            }
        }

        foreach($vaHitungDF as $kata => $value){
            $hitungIDF = log10($jumlahTask/$value) + 1;  //harus dicari dasarnya
            $vaHitungIDF[$kata] = $hitungIDF;
            $this->totalIDF += $hitungIDF;
        }

        foreach($vaHitungTF as $idTask => $task){
            foreach($task as $kata => $value){
                $kata        = $kata; 
                $hasilIDF    = $vaHitungIDF[$kata];
                $hitungTFIDF = $value * $hasilIDF;
                $vaHitungTFIDF[$idTask][$kata] = $hitungTFIDF;
            }
        }

        foreach($vaHitungTFIDF as $idTask => $task){
            $dataTask[$idTask]['deskripsi'] = $task;
        }

        // dd($vaHitungIDF);
        return $dataTask;
    }

    public function hitungMultinomialNB($dataTask, $dataTaskBaru){
        $vaHitungKataPerDivisi = array();
        $vaHitungTotalPerDivisi = array();
        $vaHitungConditionalProbability = array();
        $vaHitungPosteriorProbability = array();
        $vaHitungTotalPosteriorProbability = array();
        $jumlahTask  = count($dataTask);
        $vaDivisi    = [1=>"Support", 2=>"Mobile", 3=>"Jaringan"];
        $vaJmlDivisi = array();

        foreach($dataTask as $task){
            $idTask    = $task['idTask'];
            $deskripsi = $task['deskripsi'];
            $idDivisi    = $task['divisi'];

            $vaJmlDivisi[$idDivisi] = (isset($vaJmlDivisi[$idDivisi])) ? ($vaJmlDivisi[$idDivisi] + 1) : 1;

            foreach($vaDivisi as $id => $value){
                foreach($deskripsi as $kata => $value){
                    if ($idDivisi == $id){
                        if(isset($vaHitungTotalPerDivisi[$id])){
                            if (key_exists($kata, $vaHitungKataPerDivisi[$id])){
                                $jmlKataPerDivisiSebelumnya = $vaHitungKataPerDivisi[$id][$kata];
                                $value = $value + $jmlKataPerDivisiSebelumnya;
                                $vaHitungKataPerDivisi[$id][$kata] = $value;
                            }else{
                                $vaHitungKataPerDivisi[$id][$kata] = $value;
                            }
                        }else{
                            $vaHitungKataPerDivisi[$id][$kata] = $value;
                        }
                    }else{
                            if(!isset($vaHitungKataPerDivisi[$id][$kata])){
                                $value = 0;
                                $vaHitungKataPerDivisi[$id][$kata] = $value;
                            }
                        }
                    
                    $jmlTotalPerDivisiSebelumnya = (isset($vaHitungTotalPerDivisi[$id])) ? $vaHitungTotalPerDivisi[$id] : 0;
                    $vaHitungTotalPerDivisi[$id] = $jmlTotalPerDivisiSebelumnya + $value;
                    }
                }
        }

        foreach($vaHitungKataPerDivisi as $idDivisi => $kata){
            $totalPerDivisi = $vaHitungTotalPerDivisi[$idDivisi];
            $totalIDF = $this->totalIDF;
            foreach($kata as $kata => $value){
                $hitunngConditionalProbability = ($value+1)/($totalPerDivisi+$totalIDF);
                $vaHitungConditionalProbability[$idDivisi][$kata] = $hitunngConditionalProbability;
            }
        }

        //posterior probability
        foreach($dataTaskBaru as $taskBaru){
            $idTaskBaru = $taskBaru['idTask'];
            $deskripsiBaru = $taskBaru['deskripsi'];
            foreach($deskripsiBaru as $kata){
                foreach($vaDivisi as $idDivisi=>$divisi){
                    if (isset($vaHitungConditionalProbability[$idDivisi][$kata])){
                        $vaHitungPosteriorProbability[$idDivisi][$kata] = $vaHitungConditionalProbability[$idDivisi][$kata];
                        $jmlPosteriorProbabilitySebelumnya = (isset($vaHitungTotalPosteriorProbability[$idDivisi])) ? $vaHitungTotalPosteriorProbability[$idDivisi] : 1;
                        $vaHitungTotalPosteriorProbability[$idDivisi] = $jmlPosteriorProbabilitySebelumnya * $vaHitungConditionalProbability[$idDivisi][$kata];
                    }
                }
            }

            foreach($vaHitungTotalPosteriorProbability as $idDivisi=>$value){
                $hitungPriorProbability = $vaJmlDivisi[$idDivisi]/$jumlahTask;
                $vaHitungTotalPosteriorProbability[$idDivisi] = $value * $hitungPriorProbability;
            }
        }

        $nilaiTertinggPosterior = array_search(max($vaHitungTotalPosteriorProbability),$vaHitungTotalPosteriorProbability);
        $dataTaskBaru[0]['divisi'] = $vaDivisi[$nilaiTertinggPosterior];
        dd($dataTaskBaru);
        // return $vaDivisi[$nilaiTertinggPosterior];
    }

    public function task(){
        $data['task'] = $this->task_model->ambilDataTask();
        echo view('pages/task', $data);
    }

    public function task_karyawan()
    {
        echo view('pages/task_karyawan');
    }

    public function detail_task_karyawan()
    {
        echo view('pages/task_karyawan_detail');
    }

    public function update_report()
    {
        echo view('pages/task_update_report');
    }

    public function riwayat_task()
    {
        echo view('pages/task_riwayat');
    }

    public function detail_riwayat_task()
    {
        echo view('pages/task_riwayat_detail');
    }

    //preprocessing
    public function prosesPreprocessing($task){
        //1. Case Folding -----------------------------------------------------------
        // Removes special chars.
        $task = preg_replace('/[^A-Za-z0-9\-]/', ' ', $task); 
        $task = str_replace("-", " ", $task);
        //bersihkan angka, ganti dengan space
        $task = strtr($task, '0123456789', str_repeat(" ", 10));
        //ubah ke huruf kecil
        $task = strtolower(trim($task));
        
        //3. Stopword --------------------------------------------------------------
        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $task = $stopword->remove($task);

        //4. Stemming --------------------------------------------------------------
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemming = $stemmerFactory->createStemmer();
        $task = $stemming->stem($task);

        //2. Tokenizing ------------------------------------------------------------
        $task = explode(" ", trim($task));

        return $task;
    }



    public function stemmer()
    {
    // stem
    //$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
    $teks = "PERBAIKAN & TAMBAHAN MENU LAPORAN HRD 
    1. Mohon ditambahkan pada menu 3.6 laporan karyawan non aktif untuk melihat tanggal non aktif dengan menampilkan kolom : No, Nip, Nama, Jabatan, kantor asal, tanggal non aktif
    2. karyawan yang mengalami perubahan jabatan/ posisi kerja, perubahan kantor kerja, perubahan devisi kerja agar di munculkan kedalam menu laporan daftar riwayat kerja
    3. Untuk memudahkan pembacaan laporan pada menu tersebut maka beberapa hal yang harus di perbaiki:
    pada kolom jabatan di tambah kata perubahan sehingga sub jabatan menjadi perubahan jabatan
    kolom sebelum bertukar tempat dengan kolom sekarang
    kolom perubahan di hapus saja di ganti kolom tanggal perubahan/mutasi
    sehingga sub pada kolom jabatan berisi : kolom sebelum, sekarang, tanggal perubahan, masa jabatan";

    
    echo $output;
    echo '<br>';
    //ekonomi indonesia sedang dalam tumbuh yang bangga
    echo $stemmer->stem('Menambahkan');
    //mereka tiru
    }

    public function Classification(){
        // ---------- Data ----------------
    // data is taken from http://archive.ics.uci.edu/ml/datasets/SMS+Spam+Collection
    // we use a part for training
    $training = array(
        array('ham','Go until jurong point, crazy.. Available only in bugis n great world la e buffet... Cine there got amore wat...'),
        array('ham','Fine if that\'s the way u feel. That\'s the way its gota b'),
        array('spam','England v Macedonia - dont miss the goals/team news. Txt ur national team to 87077 eg ENGLAND to 87077 Try:WALES, SCOTLAND 4txt/ú1.20 POBOXox36504W45WQ 16+')
    );
    // and another for evaluating
    $testing = array(
        array('ham','I\'ve been searching for the right words to thank you for this breather. I promise i wont take your help for granted and will fulfil my promise. You have been wonderful and a blessing at all times.'),
        array('ham','I HAVE A DATE ON SUNDAY WITH WILL!!'),
        array('spam','XXXMobileMovieClub: To use your credit, click the WAP link in the next txt message or click here>> http://wap. xxxmobilemovieclub.com?n=QJKGIGHJJGCBL')
    );
     
    $tset = new TrainingSet(); // will hold the training documents
    $tok = new WhitespaceTokenizer(); // will split into tokens
    $ff = new DataAsFeatures(); // see features in documentation
     
    // ---------- Training ----------------
    foreach ($training as $d)
    {
        $tset->addDocument(
            $d[0], // class
            new TokensDocument(
                $tok->tokenize($d[1]) // The actual document
            )
        );
    }
     
    $model = new FeatureBasedNB(); // train a Naive Bayes model
    $model->train($ff,$tset);
     
     
    // ---------- Classification ----------------
    $cls = new MultinomialNBClassifier($ff,$model);
    dd($cls);
    $correct = 0;
    foreach ($testing as $d)
    {
        // predict if it is spam or ham
        $prediction = $cls->classify(
            array('ham','spam'), // all possible classes
            new TokensDocument(
                $tok->tokenize($d[1]) // The document
            )
        );
        if ($prediction==$d[0])
            $correct ++;
    }
     
    
   

    printf("Accuracy: %.2f\n", 100*$correct / count($testing));
     
    }
}

//manual
// foreach($deskripsi as $kata => $value){
//     if ($idDivisi == 1){
//         if(isset($vaHitungTotalPerDivisi[$idDivisi])){
//             if (key_exists($kata, $vaHitungKataPerDivisi[$idDivisi])){
//                 $jmlKataPerDivisiSebelumnya = $vaHitungKataPerDivisi[$idDivisi][$kata];
//                 $value = $value + $jmlKataPerDivisiSebelumnya;
//                 $vaHitungKataPerDivisi[$idDivisi][$kata] = $value ."no1"; 
//             }else{
//                 $vaHitungKataPerDivisi[$idDivisi][$kata] = $value."no2";
//             }
//         }else{
//             $vaHitungKataPerDivisi[$idDivisi][$kata] = $value."no3";
//         }
//     }else{
//         $isKataAda = false;
//         if (key_exists($kata, $vaHitungKataPerDivisi[1])){
//             $isKataAda = true;
//         }

//         if($isKataAda == false){
//             $value = 0;
//             $vaHitungKataPerDivisi[1][$kata] = $value ."no5";
//         }
//     }
// }