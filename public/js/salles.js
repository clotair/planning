

let prev_mot = '';
let prev_tab = [];
$(function () {
  $('[data-toggle="popover"]').popover();
})
function mois_n(n){
    let mois = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Decembre'];
    return mois[n];
}
function jour(n){
    let jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimache'];
    return jours[n];
}
function sup(){
    $('.rechercheresult').html('');
}
function rien(){
    $('.rechercheresult').html("<div class=' col-xs-8'><center><h5 class='display-4'>Auqu'une salle trouver</h5><center></div>");
}
function result(data){
    let ul = $('<ul/>').addClass('list-group list-group-flush col-xs-7').css({
        'margin-top':'20px'
    });
    for(let i of data){
        $(ul).append(
            $('<li/>').addClass('list-group-item').append(
                $('<a/>').attr('href','#s'+i.id).on('click',()=>{
                    $('#s'+i.id).trigger('click');
                }).html(i.nom)
                
                )
        )
    }
    $('.rechercheresult').html('').append($('<div/>').addClass('col-xs-3'));
    $('.rechercheresult').append(ul)
}
function search_salle(data){
    let val = $('.terme').val();
    console.log(data);
    valupc = val.toUpperCase()
    let tab = [];
    if(val >= prev_mot && prev_mot){
        for(let i of prev_tab){
            if(i['code'].indexOf(val)!=-1 || i['code'].indexOf(valupc)!=-1){
                tab.push(i)
            }else if(i['nom'].indexOf(val)!=-1 || i['nom'].indexOf(valupc)!=-1){
                tab.push(i)
            }
        }
    }else{
        for(let i of data){
            if(i['code'].indexOf(val)!=-1 || i['code'].indexOf(valupc)!=-1){
                tab.push(i)
            }else if(i['nom'].indexOf(val)!=-1 || i['nom'].indexOf(valupc)!=-1){
                tab.push(i)
            }
        }
    }
    if(tab.length!=0){
        result(tab);
    }else{
        rien();
    }
    if(!val){
        sup()
    }
    prev_mot = val;
    rev_tab = tab;
    if(!val){
        prev_tab = data
    }
}
function search_salle_active(){
    sup()
    $('.calendrier').hide(400);
    $('.recherche').fadeIn(500); 
    $('.salle.active').removeClass('active');
    $('.br').addClass('active');
}
function get_info(id){
    $.get({
        url:'/api/salle/'+id,
        success:(data)=>{
            if(data.length!=0){
                let val = data[0];
                $('#salleModal .modal-title').html(val.prof);
                $('#salleModal .modal-body').html(
                    $('<div/>').addClass('container')
                    .append(
                        
                        $('<div/>').addClass('col-xs-3').html('NOM:')
                    )    
                    .append(
                        $('<div/>').addClass('col-xs-7').html('<b>'+val.nom+'</b>')
    
                    ).append(
                        $('<div/>').addClass('col-xs-3').html('CODE:')
                    ).append(
                        $('<div/>').addClass('col-xs-4').html('<b>'+val.code+'</b>')
                    )
                
                )
            }
        }
    })
}
function planning_salle(e,titre){
 $('.recherche').hide(400);
 $('.calendrier').fadeIn(500);
 $('.salle.active').removeClass('active');
 $('#s'+e).addClass('active');
 get_info(e);
 $.get({
     url:'/api/salle/planning/'+e,
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
            }).attr('title',jour(date.getDay())+', le '+date.getDate()+' '+ mois_n(date.getMonth())+date.getFullYear()).append('<p style="width:200px">'+jour(date.getDay())+', le '+date.getDate()+' '+ mois_n(date.getMonth())+'</p>' ))
            for(let j=1;j<=17;j++){
                for(let y of i['heures']){
                    
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+5&&y['heure_fin'][0]+y['heure_fin'][1]>=j+5){
                        
                        if(y['type']=='cour'){
                            $(tab[j]).append(
                                $('<td/>').css({
                                    
                                    height:'100px',
                                    'background-color':'#1283f5',
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
                                    
                                    'background-color':'#00ff11',
                                    'opacity':'0.8'
                                }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html('<b>'+y['description']['evenement'][0]['type']+'</b>'+
                                '<br/>'+y['description']['evenement'][0]['description']
                                )
                            )    
                        }

                           
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
        $('#listePS').html(h);
        $('#listePS').append(t);
        $('#titreS').html(titre);
        
     }
 })
}