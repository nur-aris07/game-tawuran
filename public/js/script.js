// console.log('ok');
document.getElementById('CariLawan').onclick = function(){
    $.ajax({
        url: 'http://localhost/cekgame/public/serang/getenemy',
        method: 'post',
        dataType: 'json',
        success: function(data) {
            document.getElementById('userenemy').innerHTML = data.user.username;
            document.getElementById('bangunanenemy').innerHTML = data.bangunan;
            document.getElementById('uangenemy').innerHTML = data.user.uang;
            document.getElementById('makananenemy').innerHTML = data.user.makanan;
            document.getElementById('expenemy').innerHTML = data.user.exp;
            document.getElementById('poinenemy').innerHTML = data.user.tierpoin;
            document.getElementById('idenemy').value = data.user.iduser;
            document.getElementById('attackenemy').disabled = false;
            document.getElementById('attackenemy').setAttribute('class', 'btn btn-success');
        }
    })
}

document.getElementById('attackenemy').onclick = function() {
    const id = document.getElementById('idenemy').value;
    $.ajax({
        url: 'http://localhost/cekgame/public/serang/attack',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data.attack==true) {
                document.getElementById('attackresult').innerHTML = "VICTORY";
                document.getElementById('komentar').setAttribute('data-bs-target', '#skip-victory')
                document.getElementById('vmatchpoin').innerHTML = 'Poin = ' + data.tierpoin;
                document.getElementById('vmatchexp').innerHTML = 'EXP = ' + data.exp;
                document.getElementById('vmatchuang').innerHTML = 'Uang = ' + data.uang;
                document.getElementById('vmatchmakanan').innerHTML = 'Makanan = ' + data.makanan;
                document.getElementById('uang').innerHTML = 'Duit : Rp. ' + data.session.uang;
                document.getElementById('makanan').innerHTML = 'Makanan : ' + data.session.makanan;
            } else {
                document.getElementById('attackresult').innerHTML = "DEFEAT";
                document.getElementById('komentar').setAttribute('data-bs-target', '#skip-defeat')
                document.getElementById('dmatchpoin').innerHTML = 'Poin = ' + data.tierpoin;
                document.getElementById('dmatchexp').innerHTML = 'EXP = ' + data.exp;
                document.getElementById('dmatchuang').innerHTML = 'Uang = ' + data.uang;
                document.getElementById('dmatchmakanan').innerHTML = 'Makanan = ' + data.makanan;
                document.getElementById('uang').innerHTML = 'Duit : Rp. ' + data.session.uang;
                document.getElementById('makanan').innerHTML = 'Makanan : ' + data.session.makanan;
            }
        }
    })
}