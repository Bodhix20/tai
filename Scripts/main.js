

window.onload = function(){

    //first we set the event listener which will set the profile type and show the html div for setting the material of the profile
    const labels = document.querySelectorAll(".profileSelectionRadioBTN")

    for(let i=0 ; i<labels.length ; i++){
        labels[i].addEventListener("click",function(){
            const selectedProfile = document.querySelector('input[type="radio"][class="profileSelectionRadioBTN"]:checked')
  
            document.getElementById("lengthAndMaterialSelectionContainer").style.display = "block"            
        })
    }
}