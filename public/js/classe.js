$(function () {
  $('[data-toggle="popover"]').popover()
})
function mois_n(n){
    let mois = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Decembre'];
    return mois[n];
}
function jour(n){
    let jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimache']
    return jours[n]
}
function planning_classe(e,titre){
 $('.classe.active').removeClass('active');
 $('#e'+e).addClass('active');
 
 $.get({
     url:'/api/classe/planning/'+e,
     success:(data)=>{
        console.log(data);
        let tab = [];
        tab.push($('<tr/>').append(
            $('<td/>').css({
                
                height:'50px'
                
            })
        ))
        for(let i = 1;i<=17;i++){
            
            tab.push($('<tr/>').append(
                $('<td/>').css({
                                height:'50px',
                
                }).attr('scope','row').html((i+5)+'h')
            ))

        }
        let t = $('<tbody/>');

        for(let i of data){
            let date = new Date( i['date'] );
            $(tab[0]).append($('<th/>').attr('scope','col').css({
                width: '200px',
                
                height: '50px',
                'text-align': 'center',
                'padding-top': '2px',
            }).append('<p style="width:200px">'+jour(date.getDay())+', le '+date.getDate()+' '+ mois_n(date.getMonth())+'</p>' ))
            for(let j=1;j<=17;j++){
                for(let y of i['heures']){
                    
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+5&&y['heure_fin'][0]+y['heure_fin'][1]>=j+5){
                        
                            $(tab[j]).append(
                                $('<td/>').css({
                                    'font-size': '12px',
                                    height:'50px',
                                    'background-color':'orange',
                                    'opacity':'0.8',
                                    'text-align': 'center'
                                }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html(
                                    '<center>'+'<b>'+y['description']['type'][0]['nom']+'</b>'+'<br/> <b>'+ y['description']['matiere'][0]['code']+'</b>'+'<br/>'
                                   + 'Mr. <b>'+y['description']['enseignant'][0]['prof']+'</b>'
                                   +'</b>'+'</center>'
                                )
                            )

                           
                    }else{
                        $(tab[j]).append($('<td/>').css({
                            
                            height:'50px',
                            
                        }).html('')
                        );
                    }
                 
                }
         
                if(i['heures'].length==0){
                    $(tab[j]).append($('<td/>').css({
                            
                        height:'50px',
                        
                    }).html('')
                    );
                }    
            }
            
           
        }
        for(let i = 1;i<=17;i++){
           
            $(t).append(tab[i])
        }
        let h = $('<thead/>').append(tab[0]);
        $('#listePC').html(h);
        $('#listePC').append(t);
        $('#titreC').html(titre)
     }
 })
}