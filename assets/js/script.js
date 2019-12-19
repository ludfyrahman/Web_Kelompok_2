$('.rating').on('change', function () {
   alert("Changed: " + $(this).val())
});
$(".pesan").click(function(){
   return confirm("apakah anda ingin memesan kos ini ???")
})
$(".bayar").click(function(){
   return confirm("apakah anda ingin Membayar Dp kos ini ???")
})
$(".konfirmasi").click(function(){
   return confirm("apakah anda yakin ingin Membayar Dp kos ini ???")
})
var formData = new FormData();
var id_pemesanan = $("#id_pemesanan").val();
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
  addRemoveLinks: true,
  url: BASEURL+"/bayar/uploadBukti/"+id_pemesanan,
  maxFiles:1,
  method :"GET",
  paramName: 'file',
  clickable: true,
  uploadMultiple: false,
  autoProcessQueue: false,
  dictDefaultMessage: 'Unggah file anda disini',
  success: function(file, response)
    {
        console.log(file);
        console.log(response);
    },
  accept: function(file, done) {
        if (file.type != "image/jpeg" && file.type != "image/png" && file.type != "image/jpg") {
            
            if(file.type != "video/mp4"){
                done("Error! video yang anda unggah tidak diijinkan");
            }else if(file.type == "video/mp4"){
                done();
            }else{
                done("Error! gambar yang anda unggah tidak diijinkan");
            }
        }
        
        done();
    },
  init: function() {
   //  this.on("addedfile", function(file) {
   //      console.log(file);
   //      formData.append("file", file); 
   //  });
   this.on("maxfilesexceeded", function(file){
         alert("No more files please!");
   });
    this.on("removedfile", function(file) { 
        formData.delete('file');
      });
  }   
});
// process dropzone after click button
$("#simpan").click(function(e){
    e.preventDefault();
    console.log("kode "+BASEURL+"/bayar/uploadBukti/"+id_pemesanan);
    myDropzone.processQueue();
})