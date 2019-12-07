// setting dropzone for upload multiple image
$(".table").DataTable();
var currentFile = null;
var formData = new FormData();
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
  addRemoveLinks: true,
  url: BASEADM+"/kos/uploadFile/2",
  maxFiles:6,
  paramName: 'file',
  clickable: true,
  uploadMultiple: true,
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
    this.on("addedfile", function(file) {
        console.log(file);
        formData.append("file", file); 
    });
    this.on("removedfile", function(file) { 
        formData.delete('file');
      });
  }   
});
// process dropzone after click button
$("#simpan").click(function(e){
    e.preventDefault();
    alert();
    myDropzone.processQueue();
})
