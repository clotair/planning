$(function () {
  $('[data-toggle="popover"]').popover()
})
function planning_salle(e){
 $('.salle.active').removeClass('active');
 $('#s'+e).addClass('active');
 
 $.get({
     url:'/api/salle/planning/'+e,
     success:(data)=>{
        console.log(data);
        console.log(data[0]);
        let tab = [];
        tab.push($('<tr/>').append(
            $('<td/>').css({
            height:'100px'
        })
        ))
        for(let i = 1;i<=14;i++){
            
            tab.push($('<tr/>').append(
                $('<td/>').css({
                height:'100px'
            }).html((i+5)+'h')
            ))

        }
        let t = $('<tbody/>');

        for(let i of data){
            let date = new Date( i['date'] );
            $(tab[0]).append($('<td/>').append(i['date']))
            for(let j=1;j<=14;j++){
                for(let y of i['heures']){
                    console.log(y['heure_debut'][0]+y['heure_debut'][1],j)
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+5&&y['heure_fin'][0]+y['heure_fin'][1]>=j+5){
                        $(tab[j]).append(
                            $('<td/>').css({
                                height:'100px'
                            }).html(y['heure_debut']+' '+y['heure_fin'])
                        )       
                    }else{
                        $(tab[j]).append($('<td/>').css({
                            height:'100px'
                        }));
                    }
                 
                }    
            }
            
           
        }
        for(let i = 0;i<=14;i++){
            
            $(t).append(tab[i])
        }
        $('#listePS').html(t)
     }
 })
}