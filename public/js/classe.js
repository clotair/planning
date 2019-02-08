$(function () {
  $('[data-toggle="popover"]').popover()
})
function planning_classe(e){
 $('.classe.active').removeClass('active');
 $('#e'+e).addClass('active');
 
 $.get({
     url:'/api/classe/planning/'+e,
     success:(data)=>{
        console.log(data);
        let tab = [];
        tab.push($('<tr/>').append(
            $('<td/>').css({
                
                height:'50px',
                width:'100px'
            })
        ))
        for(let i = 1;i<=18;i++){
            
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
            for(let j=1;j<=18;j++){
                for(let y of i['heures']){
                    
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+5&&y['heure_fin'][0]+y['heure_fin'][1]>=j+5){
                        
                            $(tab[j]).append(
                                $('<td/>').css({
                                    
                                    height:'100px',
                                    'background-color':'orange',
                                    'opacity':'0.8'
                                }).attr('title',y['heure_debut']+'/'+y['heure_fin']).html(
                                    '<b>'+y['description']['type'][0]['nom']+'</b>'+'<br/> <b>'+ y['description']['matiere'][0]['code']+'</b>'+'<br/>'
                                   + 'Mr. <b>'+y['description']['enseignant'][0]['prof']+'</b>'
                                   +'</b>'
                                )
                            )

                           
                    }else{
                        $(tab[j]).append($('<td/>').css({
                            
                            height:'100px',
                            
                        }).html('')
                        );
                    }
                 
                }
         
                if(i['heures'].length==0){
                    $(tab[j]).append($('<td/>').css({
                            
                        height:'100px',
                        
                    }).html('')
                    );
                }    
            }
            
           
        }
        for(let i = 0;i<=18;i++){
           
            $(t).append(tab[i])
        }
        $('#listePC').html(t)
     }
 })
}