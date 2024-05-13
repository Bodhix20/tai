//import the classes used for the objects
import {profile_class} from '/Scripts/profile_class.js'

//defining the constants
const currentProfile = new profile_class()

window.onload = function(){

    //first we set the event listener which will set the profile type and show the html div for setting the material of the profile
    const labels = document.querySelectorAll(".profileLabels")

    for(let i=0 ; i<labels.length ; i++){
        labels[i].addEventListener("click",function(){
            currentProfile.setProfileType(labels[i].id)            
            console.log(currentProfile.profileType)})
    }
}