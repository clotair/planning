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
        for(let i = 0;i<=12;i++){
            tab.push($('<tr/>'))
        }
        let t = $('<tbody/>');

        for(let i of data){
            let date = new Date( i['date'] );
            $(tab[0]).append($('<td/>').append(i['date']))
            for(let j=1;j<=12;j++){
                for(let y of i['heures']){
                    console.log(y['heure_debut'][0]+y['heure_debut'][1],j)
                    if(y['heure_debut'][0]+y['heure_debut'][1]<=j+8&&y['heure_fin'][0]+y['heure_fin'][1]>=j+8){
                        $(tab[j]).append(
                            $('<td/>').css({
                                height:'100px'
                            }).html(y['heure_debut'])
                        )       
                    }else{
                        $(tab[j]).append($('<td/>').css({
                            height:'100px'
                        }));
                    }
                 
                }    
            }
            
           
        }
        for(let i = 0;i<=12;i++){
            
            $(t).append(tab[i])
        }
        $('#listePS').html(t)
     }
 })
}