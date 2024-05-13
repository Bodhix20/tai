/**
 * |--------------------------------|
 * |        Profile_class           |
 * |--------------------------------|
 * |+int profileType                |
 * |+int material                   |
 * |+int length                     |
 * |--------------------------------|
 * |setProfileType(int) : void      |
 * |setMaterial(int) : void         |
 * |setLength(int) : void           |
 * |--------------------------------|
 * 
 * profiles = ["circulaire","circulaire_creux","rectangulaire","rectangulaire_creux","I","T","U"]
 * 
 * materiaux = ["acier","acier inoxidable","aluminium"]
 */
export class profile_class {

    constructor(){
        return 1
    }

    setProfileType(profileIndex){
        this.profileType = profileIndex
    }

    setMaterial(materialIndex){
        this.material = materialIndex
    }

    setLength(length){
        this.length = length
    }
}