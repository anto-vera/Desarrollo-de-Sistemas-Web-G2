function clickbtnCalcular(){
    var txtEstatura, estatura, txtPeso, peso, imc, leyenda;
    txtEstatura = document.getElementById("txtEstatura");
    estatura = txtEstatura.value;
    txtPeso = document.getElementById("txtPeso");
    peso = txtPeso.value;

    imc = peso / ((estatura/100)*(estatura/100));
    document.getElementById("imc").innerHTML=imc.toFixed(2);

    if(imc<18.5){ 
        leyenda="Estas delgado, debes engordar.";
    }
    else{
        if(imc>=18.5 && imc<=24.9){ 
            leyenda="Estas en tu peso normal."; 
        }
        else{
            if(imc>=25 && imc<=29.9){ 
                leyenda="Estas con sobrepeso."; 
            }
            else{
                if(imc>=30 && imc<=34.9){
                    leyenda="Estas con obesidad I."; 
                }
                else{
                    if(imc>=35 && imc<=39.9){
                        leyenda="Estas con obesidad II."; 
                    }
                    else{
                        if(imc>=35 && imc<=39.9){
                            leyenda="Estas con obesidad III."; 
                        }
                    }
                }
            }
        }
    }
    document.getElementById("leyenda").innerHTML=leyenda; 
}

