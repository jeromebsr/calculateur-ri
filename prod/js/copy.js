$('#btnChuyenDoi').on('click', function () {
    $('#loading').modal('show');
    $('#textarea_out').val('');
    var s = '';
    s = $('#textarea_in').val();
    var arr = [
        { "DauSoCu": ":0120", "DauSoMoi": ":070" },
        { "DauSoCu": "+84120", "DauSoMoi": ":070" },

        { "DauSoCu": ":0121", "DauSoMoi": ":079" },
        { "DauSoCu": ":+84121", "DauSoMoi": ":079" },

        { "DauSoCu": ":0122", "DauSoMoi": ":077" },
        { "DauSoCu": ":+84122", "DauSoMoi": ":077" },

        { "DauSoCu": ":0126", "DauSoMoi": ":076" },
        { "DauSoCu": ":+84126", "DauSoMoi": ":076" },

        { "DauSoCu": ":0128", "DauSoMoi": ":078" },
        { "DauSoCu": ":+84128", "DauSoMoi": ":078" },

        //
        { "DauSoCu": ":0123", "DauSoMoi": ":083" },
        { "DauSoCu": ":+84123", "DauSoMoi": ":083" },

        { "DauSoCu": ":0124", "DauSoMoi": ":084" },
        { "DauSoCu": ":+84124", "DauSoMoi": ":084" },

        { "DauSoCu": ":0125", "DauSoMoi": ":085" },
        { "DauSoCu": ":+84125", "DauSoMoi": ":085" },

        { "DauSoCu": ":0127", "DauSoMoi": ":081" },
        { "DauSoCu": ":+84127", "DauSoMoi": ":081" },

        { "DauSoCu": ":0129", "DauSoMoi": ":082" },
        { "DauSoCu": ":+84129", "DauSoMoi": ":082" },

        //
        { "DauSoCu": ":0162", "DauSoMoi": ":032" },
        { "DauSoCu": ":+84162", "DauSoMoi": ":032" },

        { "DauSoCu": ":0163", "DauSoMoi": ":033" },
        { "DauSoCu": ":+84163", "DauSoMoi": ":033" },

        { "DauSoCu": ":0164", "DauSoMoi": ":034" },
        { "DauSoCu": ":+84164", "DauSoMoi": ":034" },

        { "DauSoCu": ":0165", "DauSoMoi": ":035" },
        { "DauSoCu": ":+84165", "DauSoMoi": ":035" },

        { "DauSoCu": ":0166", "DauSoMoi": ":036" },
        { "DauSoCu": ":+84166", "DauSoMoi": ":036" },

        { "DauSoCu": ":0167", "DauSoMoi": ":037" },
        { "DauSoCu": ":+84167", "DauSoMoi": ":037" },

        { "DauSoCu": ":0168", "DauSoMoi": ":038" },
        { "DauSoCu": ":+84168", "DauSoMoi": ":038" },

        { "DauSoCu": ":0169", "DauSoMoi": ":039" },
        { "DauSoCu": ":+84169", "DauSoMoi": ":039" },

        //
        { "DauSoCu": ":0186", "DauSoMoi": ":056" },
        { "DauSoCu": ":+84186", "DauSoMoi": ":056" },
        { "DauSoCu": ":0188", "DauSoMoi": ":058" },
        { "DauSoCu": ":+84188", "DauSoMoi": ":058" },

        //
        { "DauSoCu": ":0199", "DauSoMoi": ":059" },
        { "DauSoCu": ":+84199", "DauSoMoi": ":059" }
    ];
    var dem = 0;
    var arr_s = s.split("TYPE=PREF");
    var output = '';
    if (arr_s != null && arr != null) {
        for (var i = 0; i < arr_s.length; i++) {
            var s1 = arr_s[i];
            for (var j = 0; j < arr.length; j++) {
                s1 = s1.replace(arr[j].DauSoCu, arr[j].DauSoMoi);
            }
            if (i != arr_s.length - 1) {
                output += s1 + "TYPE=PREF";
            } else {
                output += s1;
            }
        }
        var output_2 = output.split("TYPE=PREF");
        $('#textarea_out').val(output);
        $('#loading').modal('hide');
    }
});
$('#btnCoppy').on('click', function () {
    $('#textarea_out').select();
    document.execCommand("copy");
    $('#overlay').modal('show');
    if ($('#textarea_out').val() != '') {
        $('#message').text('Template copié dans le presse-papier !');
    } else $('#message').text('Erreur : La zone de text est vide.');
    setTimeout(function () {
        $('#overlay').modal('hide');
    }, 1500);
});
//-------------------------------------------
var url = '';
$('#fileUpload').change(function (event) {
    url = URL.createObjectURL(event.target.files[0]);
});
$('#btnChuyenDoi2').on('click', function () {
    if (url != null) {
        XuLy(url);
    }
});
function XuLy(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "text",
        success: function (data) { processData(data); }
    });
}
function processData(allText) {
    var s = allText;
    var arr = [
        { "DauSoCu": ":0120", "DauSoMoi": ":070" },
        { "DauSoCu": "+84120", "DauSoMoi": ":070" },

        { "DauSoCu": ":0121", "DauSoMoi": ":079" },
        { "DauSoCu": ":+84121", "DauSoMoi": ":079" },

        { "DauSoCu": ":0122", "DauSoMoi": ":077" },
        { "DauSoCu": ":+84122", "DauSoMoi": ":077" },

        { "DauSoCu": ":0126", "DauSoMoi": ":076" },
        { "DauSoCu": ":+84126", "DauSoMoi": ":076" },

        { "DauSoCu": ":0128", "DauSoMoi": ":078" },
        { "DauSoCu": ":+84128", "DauSoMoi": ":078" },

        //
        { "DauSoCu": ":0123", "DauSoMoi": ":083" },
        { "DauSoCu": ":+84123", "DauSoMoi": ":083" },

        { "DauSoCu": ":0124", "DauSoMoi": ":084" },
        { "DauSoCu": ":+84124", "DauSoMoi": ":084" },

        { "DauSoCu": ":0125", "DauSoMoi": ":085" },
        { "DauSoCu": ":+84125", "DauSoMoi": ":085" },

        { "DauSoCu": ":0127", "DauSoMoi": ":081" },
        { "DauSoCu": ":+84127", "DauSoMoi": ":081" },

        { "DauSoCu": ":0129", "DauSoMoi": ":082" },
        { "DauSoCu": ":+84129", "DauSoMoi": ":082" },

        //
        { "DauSoCu": ":0162", "DauSoMoi": ":032" },
        { "DauSoCu": ":+84162", "DauSoMoi": ":032" },

        { "DauSoCu": ":0163", "DauSoMoi": ":033" },
        { "DauSoCu": ":+84163", "DauSoMoi": ":033" },

        { "DauSoCu": ":0164", "DauSoMoi": ":034" },
        { "DauSoCu": ":+84164", "DauSoMoi": ":034" },

        { "DauSoCu": ":0165", "DauSoMoi": ":035" },
        { "DauSoCu": ":+84165", "DauSoMoi": ":035" },

        { "DauSoCu": ":0166", "DauSoMoi": ":036" },
        { "DauSoCu": ":+84166", "DauSoMoi": ":036" },

        { "DauSoCu": ":0167", "DauSoMoi": ":037" },
        { "DauSoCu": ":+84167", "DauSoMoi": ":037" },

        { "DauSoCu": ":0168", "DauSoMoi": ":038" },
        { "DauSoCu": ":+84168", "DauSoMoi": ":038" },

        { "DauSoCu": ":0169", "DauSoMoi": ":039" },
        { "DauSoCu": ":+84169", "DauSoMoi": ":039" },

        //
        { "DauSoCu": ":0186", "DauSoMoi": ":056" },
        { "DauSoCu": ":+84186", "DauSoMoi": ":056" },
        { "DauSoCu": ":0188", "DauSoMoi": ":058" },
        { "DauSoCu": ":+84188", "DauSoMoi": ":058" },

        //
        { "DauSoCu": ":0199", "DauSoMoi": ":059" },
        { "DauSoCu": ":+84199", "DauSoMoi": ":059" }
    ];
    var output_data = ChuyenDoi(s, arr);
    var filename = $('#fileUpload').val().replace(/C:\\fakepath\\/i, '');
    var filename = "export_" + (filename.split(".")[0]) + ".vcf";
    exportToCsv(filename, output_data);
}
function ChuyenDoi(s, arr) {
    var output = '';
    data = s.split("TYPE=PREF");
    if (data != null && arr != null) {
        for (var i = 0; i < data.length; i++) {
            var s1 = data[i];
            for (var j = 0; j < arr.length; j++) {
                s1 = s1.replace(arr[j].DauSoCu, arr[j].DauSoMoi);
            }
            if (i != data.length - 1) {
                output += s1 + "TYPE=PREF";
            } else {
                output += s1;
            }
        }
        $('#textarea_out').val(output);
        $('#loading').modal('hide');
    }
    return output;
}
function exportToCsv(filename, data) {
    var vcfFile = '';
    vcfFile = data;
    var blob = new Blob([vcfFile], { type: 'text/vcf;charset=utf-8;' });
    if (navigator.msSaveBlob) {
        navigator.msSaveBlob(blob, filename);
    } else {
        var link = document.createElement("a");
        if (link.download !== undefined) {
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", filename);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
}