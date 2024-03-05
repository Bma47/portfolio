// 
const cel11 = document.getElementById("kiez_11");
const cel14 = document.getElementById("kiez_14");
const cel24 = document.getElementById("kiez_24");
const cel34 = document.getElementById("kiez_34");
const cel42 = document.getElementById("kiez_42");
const cel43 = document.getElementById("kiez_43");


const cel22 = document.getElementById("vul_22");
const cel23 = document.getElementById("vul_23");
const cel32 = document.getElementById("vul_32");
const cel33 = document.getElementById("vul_33");




// (((((((((({{{{{{{{{{kiez willekeurige groep}}}}}}}}}}}})))))))))))\\
const kiez1 = {
    cel11: 60,
    cel14: 35,
    cel24: 55,
    cel34: 40,
    cel42: 20,
    cel43: 75
}
const kiez2 = {
    cel11: 15,
    cel14: 14,
    cel24: 18,
    cel34: 11,
    cel42: 8,
    cel43: 21
}
const kiez3 = {
    cel11: 12,
    cel14: 8,
    cel24: 14,
    cel34: 6,
    cel42: 10,
    cel43: 10
}
const kiez4 = {
    cel11: 25,
    cel14: 3,
    cel24: 18,
    cel34: 10,
    cel42: 7,
    cel43: 21
}
const kiez5 = {
    cel11: 46,
    cel14: 27,
    cel24: 19,
    cel34: 54,
    cel42: 36,
    cel43: 37
}
const kiez6 = {
    cel11: 67, //inut22=32 , input23= 12, input32= 3 , input33= 35
    cel14: 15,
    cel24: 44,
    cel34: 38,
    cel42: 47,
    cel43: 35
}
const kiez7 = {
    cel11: 50,
    cel14: 50,
    cel24: 30,
    cel34: 70,
    cel42: 60,
    cel43: 40
}

const kiez8 = {
    cel11: 27,
    cel14: 27,
    cel24: 25,
    cel34: 29,
    cel42: 28,
    cel43: 26
}

const kiez9 = {
    cel11: 77,
    cel14: 77,
    cel24: 55,
    cel34: 99,
    cel42:88,
    cel43: 66
}
const kiez10 = {
    cel11: 110,
    cel14: 40,
    cel24: 15,
    cel34: 135,
    cel42: 45,
    cel43: 105
}

// (((((((((({{{{{{{{{{ kiezSelect array  groep    }}}}}}}}}}}})))))))))))\\
// (((((((((({{{{{{{{{{  }}}}}}}}}}}})))))))))))\\

const kiezSelect = [kiez1, kiez2, kiez3, kiez4, kiez5, kiez6, kiez7, kiez8, kiez9, kiez10]
const random = () =>{
    let willekeurige = kiezSelect[Math.floor(Math.random()*kiezSelect.length)]

     cel11.innerText = willekeurige.cel11
     cel14.innerText = willekeurige.cel14
     cel24.innerText = willekeurige.cel24
     cel34.innerText = willekeurige.cel34
     cel42.innerText = willekeurige.cel42
     cel43.innerText = willekeurige.cel43  
}

const check = () =>{
    let inp22 = Number(cel22.value)
    let inp23 = Number(cel23.value)
    let inp32 = Number(cel32.value)
    let inp33 = Number(cel33.value)

    let val11 = Number(cel11.innerText)
    let val14 = Number(cel14.innerText)
    let val24 = Number(cel24.innerText)
    let val34 = Number(cel34.innerText)
    let val42 = Number(cel42.innerText)
    let val43 = Number(cel43.innerText)   
    if(inp22 + inp23 == val24 && inp23 + inp33 == val43 && inp33 + inp32 == val34 && inp32 + inp22 == val42 && inp32 + inp23 == val14 && inp33 + inp22 == val11){
        alert("SUUUUUUUUUU");
    } else {
        alert("NOOOOOOOOOOO")
    }
}  