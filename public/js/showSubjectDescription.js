function showSubjectDescription($sifProfesora,$sifPredmeta){
    var model=$('#subjectDescription');
    model.empty();
    $.get('/subjectDescription',"sifProfesora=" + $sifProfesora + "&sifPredmeta=" + $sifPredmeta,function(data){//ovo je ruta
        model.append(data);
    })
};
