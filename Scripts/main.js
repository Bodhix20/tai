//importing the necessary module
import { profile_class } from "./profile_class"

//instantiate the class
const currentProfile = new profile_class()

window.onload = function(){

    //first we set the event listener which will set the profile type and show the html div for setting the material of the profile
    const labels = document.querySelectorAll(".profileSelectionRadioBTN")

    for(let i=0 ; i<labels.length ; i++){
        labels[i].addEventListener("click",function(){
            currentProfile.setProfileType(i)
            document.getElementById("lengthAndMaterialSelectionContainer").style.display = "block"            
        })
    }
}