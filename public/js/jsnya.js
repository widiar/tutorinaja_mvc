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
    $(".profilsiswa").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isiprofilsiswa").html(data);
            }
        });
        $("#profilesiswa").modal('show');
    });
    $(".profiltutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isiprofiltutor").html(data);
            }
        });
        $("#profiletutor").modal('show');
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
    $(".liatdetailsiswa").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(data){
                $(".isidetailsiswa").html(data[0]);
                $(".tomboldetailsiswa").html(data[1]);
            }
        });
        $("#detailsiswa").modal('show');
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
    });
    $(".logout").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Logout',
            text: 'Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed) {
                window.location.href = $(this).attr('href');
            }
        })
    })
    
});
function updateterima(param){
    data = param + "="
    $(".updatediterima").submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Anda yakin?',
            text: 'Sekalinya anda rubah, dia tidak bisa dirubah lagi',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, yakin!',
            cancelButtonText: 'Jangan deh',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type: $(".updatediterima").attr("method"),
                    url: $(".updatediterima").attr("action"),
                    data: data,
                    dataType: 'html',
                    success: function(msg){
                        if(msg == 'Sukses')
                            Swal.fire(
                                'Sukses dong',
                                'Berhasil ngubah status siswa',
                                'success'
                            ).then((result)=> {window.location.href = ''; });
                        else
                            Swal.fire(
                                'Gagal',
                                'Terjadi Kesalahan',
                                'error'
                            ).then((result)=> {window.location.href = ''; });
                                
                    }
                })
            }
        });
    });
}

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
                if (result.isConfirmed) {
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
                                    'error'
                                ).then((result)=> {window.location.href = ''; });  
                        }
                    }) 
                }
            })
    })
}