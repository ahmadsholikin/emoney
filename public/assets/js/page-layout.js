var options = {
    url: function(phrase) {
        return "https://sipgan.magelangkab.go.id/sipgan/api/restpns/search?key=" + phrase + "&format=json";
    },
    getValue: "hasil",
    list: {
        match: {
            enabled: true
        }
    },
    theme: "square"
};

$("#link_atasan_id").easyAutocomplete(options);

function simpanLink()
{
    var link_atasan_id = $("#link_atasan_id").val();
    if(link_atasan_id!='')
    {
        // ajax to get_primary_key
        $.ajax(
        {
            url     : backend_url+'/users/simpan-link',
            type    : 'POST',
            data    : { 
                        "link_atasan_id"   : link_atasan_id,
                        "csrf_app"         : $("input[name='csrf_app']").val()
                    },
            success: function(data)
            {
                loadLink();
            },
            error: function(data)
            {
                console.log('error '+data);
            }
        });
    }
    else
    {
        alert("Belum ada pilihan akun atasan");
    }
}

function loadLink()
{
    $("#linked tbody tr").remove(); 
    $.ajax({
        url: backend_url+'/users/memuat-link',
        type: 'POST',
        data: {
            "csrf_app"         : $("input[name='csrf_app']").val()
        },
        success: function (response)
        {
            response = $.parseJSON(response);

            var trHTML = '';
                $.each(response, function (i, item) {
                    trHTML += "<tr><td>" + item.link_atasan_id + "</td><td>" + item.link_atasan_nama + "</td><td><a style='cursor:pointer' onclick='aktifLink(" + item.link_hirarki_id + ")'>"+ item.is_active +"</a></td><td><a onclick='removeLink(" + item.link_hirarki_id + ")'><i class='fas fa-trash'></i></a></td></tr>";
                });
            $('#linked').append(trHTML);
        }
    });
}

function removeLink(link_hirarki_id)
{
    if(link_hirarki_id!='')
    {
        // ajax to get_primary_key
        $.ajax(
        {
            url     : backend_url+'/users/hapus-link',
            type    : 'POST',
            data    : { 
                        "link_hirarki_id"   : link_hirarki_id,
                        "csrf_app"         : $("input[name='csrf_app']").val()
                    },
            success: function(data)
            {
                if(data=='1')
                {
                    loadLink();
                }
                else
                {
                    $.alert({
                        title: 'Informasi',
                        content: 'Data yang Anda pilih tidak dapat dihapus karena data dipakai dalam keperluan data lainnya. Terimakasih :)',
                    });
                }
            },
            error: function(data)
            {
                console.log('error '+data);
            }
        });
    }
    else
    {
        alert("Belum ada pilihan akun atasan");
    }
}

function aktifLink(link_hirarki_id)
{
    if(link_hirarki_id!='')
    {
        // ajax to get_primary_key
        $.ajax(
        {
            url     : backend_url+'/users/aktif-link',
            type    : 'POST',
            data    : { 
                        "link_hirarki_id"   : link_hirarki_id,
                        "csrf_app"         : $("input[name='csrf_app']").val()
                    },
            success: function(data)
            {
                loadLink();
            },
            error: function(data)
            {
                console.log('error '+data);
            }
        });
    }
    else
    {
        alert("Belum ada pilihan akun atasan");
    }
}