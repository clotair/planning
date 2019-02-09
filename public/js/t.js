if(y['type']=='cour'){
    $(tab[j]).append(
        $('<td/>').css({
            
            height:'100px',
            'background-color':'orange',
            'opacity':'0.8'
        }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html(
             '<b>'+y['description']['type'][0]['nom']+'</b>'+'<br/>'+' <b>'+ y['description']['matiere'][0]['code']+'</b>'
             +'<br/>'+'<b>' +y['description']['classe'][0]['code']+'</b>'
            + '<br/>Mr. ' + '<b>'+y['description']['enseignant'][0]['prof']+'</b>'
           
           
        )
    )
}else{
    $(tab[j]).append(
        $('<td/>').css({
            
            height:'100px',
            
            'background-color':'#1283f5',
            'opacity':'0.8'
        }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html('<b>'+y['description']['evenement'][0]['type']+'</b>'+
        '<br/>'+y['description']['evenement'][0]['description']
        )
    )    
}