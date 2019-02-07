$(function () {
  $('[data-toggle="popover"]').popover()
})
function planning_enseignant(e){
 $('.salle.active').removeClass('active');
 $('#e'+e).addClass('active');
 
 $.get({
     url:'/api/enseignant/planning/'+e,
     success:(data)=>{
        console.log(data);
        let tab = [];
        tab.push($('<tr/>').append(
            $('<td/>').css({
                
                height:'100px',
                
            })
        ))
        for(let i = 1;i<=14;i++){
            
            tab.push($('<tr/>').append(
                $('<td/>').css({
                                height:'100px',
                
            }).html((i+5)+'h')
            ))

        }
        let t = $('<tbody/>');

        for(let i of data){
            let date = new Date( i['date'] );
            $(tab[0]).append($('<td/>').append(i['date']))
            for(let j=1;j<=14;j++){
                for(let y of i['heures']){
                    
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+5&&y['heure_fin'][0]+y['heure_fin'][1]>=j+5){
                        
                            $(tab[j]).append(
                                $('<td/>').css({
                                    
                                    height:'100px',
                                    width:'300px',
                                    'background-color':'orange',
                                    'opacity':'0.8'
                                }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html(
                                   'Matiere:<br/> <b>'+ y['description']['matiere'][0]['code']+'</b>'+'<br/>'
                                   + 'Salle: ' + y['description']['enseignant'][0]['grade'] +'<br/>'+ '<b>'+y['description']['enseignant'][0]['prof']+'</b>'
                                   +'<br/>'+'Classe: <br/>'+'<b>' +y['description']['classe'][0]['code']+'</b>'+
                                   '<br/>'+'Cour de'+ '<b>'+y['description']['type'][0]['nom']+'</b>'
                                )
                            )

                           
                    }else{
                        $(tab[j]).append($('<td/>').css({
                            
                            height:'100px',
                            
                        }));
                    }
                 
                }    
            }
            
           
        }
        for(let i = 0;i<=14;i++){
           
            $(t).append(tab[i])
        }
        $('#listePE').html(t)
     }
 })
}