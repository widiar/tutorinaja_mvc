$(document).ready(function(){
    $(".liatfototutor, .liatijasahtutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isinyat").html(data);
            }
        });
        $("#fotoijasahtutor").modal('show');
    });
    $(".liatdetailtutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(data){
                $(".isidetailtutor").html(data[0]);
                $(".tomboldetailtutor").html(data[1]);
            }
        });
        $("#detailtutor").modal('show');
    });
    $(".detailtutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(string){
                $(".isiprofile").html(string[0]);
                $(".isibawah").html(string[1]);
            }
        });
        $("#modalprofilTutor").modal('show');
    })
})

function veriftutor()
{
    $(".konfirm").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Confirm',
            text: "Anda yakin ubah status tutor ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin dong!',
            cancelButtonText: 'Ga, jangan deh',
            }).then((result) => {
                if (result) {
                    $.ajax({
                        url: $(this).attr("href"),
                        dataType: 'html',
                        success: function(cek){
                            if(cek == 'Sukses')
                                Swal.fire(
                                    'Sukses dong',
                                    'Berhasil ngubah status tutor',
                                    'success'
                                ).then((result)=> {window.location.href = ''; });
                            else
                                Swal.fire(
                                    'Gagal',
                                    'Terjadi Kesalahan',
                                    'failed'
                                ).then((result)=> {window.location.href = ''; });  
                        }
                    }) 
                }
            })
    })
}