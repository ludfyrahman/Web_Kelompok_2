// console.log(getCookie("lat"));
$(".mdi-delete-forever").click(function(){
  return confirm("Apakah anda yakin");
})
$('.btn-filter-pemesanan').click(function() {
  window.location=BASEADM + "pemesanan&start_date=" + $('#start_date').val() + "&end_date=" + $('#end_date').val() + "&status=" + $('#status').val()
});
$('.btn-filter-pembayaran').click(function() {
  window.location=BASEADM + "pembayaran&start_date=" + $('#start_date').val() + "&end_date=" + $('#end_date').val() + "&status=" + $('#status').val()
});

// setting dropzone for upload multiple image
$(".table").DataTable(
  {
    dom: 'Bfrtip',
    buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]
}
);
var currentFile = null;

var lat = getCookie("lat");
var long = getCookie("long");
$(".simpan").click(function(){
    // alert(nama);
    // myDropzone.processQueue();
})
var formData = new FormData();
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
    addRemoveLinks: true,
    url: BASEADM+"kost/add",
    maxFiles:1,
    method :"POST",
    paramName: 'file',
    params: {
            nama:$("input[name='nama']").val(),
            jumlah_kamar: $("input[name='jumlah_kamar']").val(),
            jenis_kos: $("select[name='jenis_kos']").val(),
            harga: $("input[name='harga']").val(),
            deskripsi: $("textarea[name='deskripsi']").val(),
            id_kategori: $("select[name='kategori']").val(),
            latitude: lat,
            longitude: long,
        },
    clickable: true,
    uploadMultiple: false,
    autoProcessQueue: false,
  dictDefaultMessage: 'Unggah file anda disini',
  success: function(file, response)
    {
        console.log(file);
        console.log(response);
    },
  init: function() {
    this.on("addedfile", function(file) {
        console.log(file);
        formData.append("file", file);
        formData.append("nama", "Mochamad Ludfi Rahman") ;
    });
    this.on("removedfile", function(file) { 
        formData.delete('file');
      });
  }   
});
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
// process dropzone after click button
