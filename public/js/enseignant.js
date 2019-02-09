

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
    $('.rechercheresult').html("<div class=' col-xs-8'><center><h5 class='display-4'>Auqu'un enseignant trouver</h5><center></div>");
}
function result(data){
 
    let ul = $('<ul/>').addClass('list-group list-group-flush col-xs-7');
    for(let i of data){
        $(ul).append(
            $('<li/>').addClass('list-group-item').append(
                $('<a/>').attr('href','#e'+i.id).on('click',()=>{
                    $('#e'+i.id).trigger('click');
                }).html(i.prof)
                
                )
        )
    }
    $('.rechercheresult').html('').append($('<div/>').addClass('col-xs-3'));
    $('.rechercheresult').append(ul)
}
function search_enseignant(data){
    let val = $('.terme').val();
    console.log(data);
    valupc = val.toUpperCase()
    let tab = [];
    if(val >= prev_mot && prev_mot){
        for(let i of prev_tab){
            if(i['prof'].indexOf(val)!=-1 || i['prof'].indexOf(valupc)!=-1){
                tab.push(i)
            }else if(i['grade'].indexOf(val)!=-1 || i['grade'].indexOf(valupc)!=-1){
                tab.push(i)
            }
        }
    }else{
        for(let i of data){
            if(i['prof'].indexOf(val)!=-1 || i['prof'].indexOf(valupc)!=-1){
                tab.push(i)
            }else if(i['grade'].indexOf(val)!=-1 || i['grade'].indexOf(valupc)!=-1){
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
function search_enseignant_active(){
    sup()
    $('.calendrier').hide(400);
    $('.recherche').fadeIn(500); 
    $('.enseignant.active').removeClass('active');
    $('.br').addClass('active');
}
function get_info(id){
    $.get({
        url:'/api/enseignant/'+id,
        success:(data)=>{
            if(data.length!=0){
                let val = data[0];
                $('#enseignantModal .modal-title').html(val.prof);
                $('#enseignantModal .modal-body').html(
                    $('<div/>').addClass('container')
                    .append(
                        
                        $('<div/>').addClass('col-xs-4').html('NOM:')
                    )    
                    .append(
                        $('<div/>').addClass('col-xs-6').html('<b>'+val.prof+'</b>')
    
                    ).append(
                        $('<div/>').addClass('col-xs-4').html('GRADE:')
                    ).append(
                        $('<div/>').addClass('col-xs-4').html('<b>'+val.grade+'</b>')
                    )
                
                )
            }
        }
    })
}
function planning_enseignant(e,titre){
 $('.recherche').hide(400);
 $('.calendrier').fadeIn(500);
 $('.enseignant.active').removeClass('active');
 $('#e'+e).addClass('active');
 get_info(e);
 $.get({
     url:'/api/enseignant/planning/'+e,
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
                        
                            $(tab[j]).append(
                                $('<td/>').css({
                                    'font-size': '12px',
                                    height:'50px',
                                    'background-color':'orange',
                                    'opacity':'0.8',
                                    'text-align': 'center'
                                }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html(
                                    '<center>'+'<b>'+y['description']['type'][0]['nom']+'</b>'+'<br/> <b>'+ y['description']['matiere'][0]['code']+'</b>'+'<br/>'
                                   + ' <b>'+y['description']['classe'][0]['code']+'</b>'
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
        $('#listePE').html(h);
        $('#listePE').append(t);
        $('#titreE').html(titre);
        
     }
 })
}