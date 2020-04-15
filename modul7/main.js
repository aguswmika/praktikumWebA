document.addEventListener('DOMContentLoaded', function(){
    var numberButton = document.querySelectorAll('.number'); // selector untuk mengambil semua elemen dengan class number
    var operatorButton = document.querySelectorAll('.operator'); // sekector untuk mengambil semua elemen dengan class operator
    var display = document.querySelector('#display'); // selector untuk mengambil elemen dengan id display
    var acButton = document.querySelector('#clear');// selector untuk mengambil elemen dengan id clear
    var hasil = document.querySelector('#hasil');// selector untuk mengambil elemen dngan id hasil

    var firstNumber = ""; // variabel untuk menyimpan angka yang akan dioperasikan
    var lastNumber = ""; // variabel untuk menyimpan angka yang digunakan untuk mengoperasikan angka sebelumnya
    var operator = ""; // variabel untuk menyimpan operator
    var stage = 1; // variabel yang menjadi counter untuk kondisi input dari operator
    //stage 1 : user menginputkan angka yang akan dioperasikan
    //stage 2 : user menginputkan operator
    //stage 3++ : user menginputkan angka yang digunakan untuk mengoperasikan
    //stage 4++ : mengindikasikan program sudah menghasilkan output berupa hasil operasi 

    numberButton.forEach(function(elem){ //fungsi untuk memproses semua elemen di variabel numberButton yang setiap elemennya akan disimpan sebagai variabel elem
        elem.addEventListener('click', function () {//fungsi saat elem di click
            if(stage === 1){ //jika user berada pada stage 1 maka user akan menginputkan firstnumber
                firstNumber += elem.innerText; //firstnumber akan di concat dengan inner text pada elemen yang di click hingga user menginputkan operator
            }else if(stage >= 3){ //jika user berada pada stage 3++ maka user akan menginputkan angka yang digunakan untuk mengoperasikan
                lastNumber += elem.innerText; //last number akan di concat dengan inner text pada elemen yang di click
                stage++; //setiap kali elemen di click pada stage ini maka stage akan bertambah
            }

            display.innerText = firstNumber + " " + operator + " " + lastNumber; // melakukan output pada elemen display
        });
    });

    operatorButton.forEach(function (elem) { //fungsi untuk memproses semua elemen di variabel operatorButton yang setiap elemennya akan disimpan sebagai variabel elem 
        elem.addEventListener('click', function () { //fungsi jika elem di click
            stage = 2; //menset stage menjadi 2 yang menandakan user menginputkan operator
            if (stage === 2) { 
                operator = elem.innerText; //jika stagenya 2 maka nilai dari operator akan di concat dengan inner text dari elemen yang di click
            }

            stage ++; //menambahkan nilai stage , agar user bisa menginputkan lastNumber

            display.innerText = firstNumber + " " + operator + " " + lastNumber;// melakukan output pada elemen display
        });
    });

    hasil.addEventListener('click', function(){ //fungsi untuk saat elemen pada variabel hasil di click
        if(stage > 3){ //jika stage 4++ maka program akan menghitung hasil operasi
            firstNumber = parseFloat(firstNumber); //nilai firstNumber diubah ke tipe float yang sebelumnya string
            lastNumber = parseFloat(lastNumber); //nilai lastNumber diubah ke tipe float yang sebelumnya string

            if (operator === '+') //jika nilai operator + maka operasi adalah penjumlahan
                hasil = firstNumber + lastNumber; //melakukan penjumlahan
            else if(operator === '-') //jika operator adalah "-" maka operasi adalah pengurangan
                hasil = firstNumber - lastNumber; //melakukan pengurangan
            else if(operator === '*') //jika nilai operator adalah "*" maka operasi adalah perkalian
                hasil = firstNumber * lastNumber; //melakukan perkalian
            else if(operator === '/')//jika nilai operator adalah "/" maka operasi adalah pembagian
                hasil = firstNumber / lastNumber; //melakukan pembagian

            display.innerText = hasil; //mengubah inner text dari variabel display menjadi nilai hasil

            firstNumber = hasil; //firstNumber untk operasi selanjutnya adalah nilai dari hasil operasi sebelumnya
            lastNumber = "";//menset lastNumber menjadi kosong
            operator = ""; //menset operator menjadi kosong
            stage = 1; //menset stage menjadi 1 yang menandakan user ada pada kondisi menginputkan firstnumber
        }
    });

    acButton.addEventListener('click', function () { //fungsi untuk saat elemen variabel acButton di click yaitu mereset calcultor
        firstNumber = ""; //mereset atau men-set firstnumber menjadi kosong
        lastNumber = ""; //mereset atau men-set lastnumber menjadi kosong
        operator = ""; //menset operator menjadi kosong
        stage = 1; //menset atau mereset stage menjadi 1 yang menandakan user ada pada kondisi menginputkan firstnumber

        display.innerText = "0"; //mengubah inner text variabel display menjadi "0"
    });

});