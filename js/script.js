// Setelah 3 detik, tambahkan kelas fadeout untuk menghilangkan alert
setTimeout(function(){
    document.getElementById('alert').classList.add('fadeout');
  }, 3000);