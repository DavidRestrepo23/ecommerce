
<template>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="card card-default">
                <div class="card-header">
                    Combinaciones
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nombre</th>
                        </thead>
                        <tbody>
                            <tr v-for="(combination, index) in combinations" :key="index">
                                <td>{{ "Talla -" + combination.size + ", Color - " + combination.color }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" @click="findCombination('Rojo')">Generar</button>
                    <div>
                        Colores
                        <ul>
                            <li v-for="(combination, index) in resulColores" :key="index">
                                <button type="button" @click="fillSize(combination.color)">{{ combination.color }}</button>
                            </li>
                        </ul>
                    </div>
                    <div v-for="(combination, index) in resulCombination" :key="index">
                       {{ index }}
                        <select name="" id="" >
                            <option v-for="(value, index) in combination" :key="index" :value="value">{{ value }}</option>
                        </select>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'ProductCombinationComponent',
    data(){
        return{
            combinations:[
                {"color": "Rojo", "key": "Talla", "value": "S" },
                {"color": "Rojo", "key": "Talla", "value": "L" },
                {"color": "Rojo", "key": "Talla", "value": "M" },
                {"color": "Rojo", "key": "Dimensión", "value": "60x90cm" },
                {"color": "Verde", "key": "Talla", "value": "S" },
                {"color": "Verde", "key": "Talla", "value": "L" },
                {"color": "Verde", "key": "Talla", "value": "M" },
                {"color": "Verde", "key": "Talla", "value": "XL" },
            ],
            resulColores:[],
            resulCombination:[],
           
            Nresul:[],
        }
    },
    props:['productid'],
    
    methods:{
         /** Filtramos el array para obtener los colores sin repetir */
        findCombination(item){
            const resulFilterColor =  Object.values(this.combinations.reduce((prev,next)=>Object.assign(prev,{[next.color]:next}),{}))
            resulFilterColor.forEach(data => {
                this.resulColores.push({
                    color:data.color
                });
            });
        },
        fillSize(color){
            // //const resul =  this.combinations.filter(item => item.color === color).map( item => ({ size:item.size, dimensión:item.dimension}));
            let resul =  this.combinations.filter(item => item.color === color).map(item => ({attribute:item.key, value:item.value}));
            let groups = {};
            resul.forEach(data=>{
                var groupName = data.attribute;
                if (!groups[groupName]) {
                    groups[groupName] = [];   
                }
                groups[groupName].push(data.value);
            });
           
           this.resulCombination = groups;   
        },
       
        
        
    }
}
</script>







<!--

<template>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="card card-default">
                <div class="card-header">
                    Combinaciones
                </div>
                <div class="card-body">
                    <button type="button" @click="findCombination('Rojo')">Generar</button>
                    <div>
                        Colores
                        <ul>
                            <li v-for="(combination, index) in resulColores" :key="index">
                                <button type="button" @click="fillSize(combination.color)">{{ combination.color }}</button>
                            </li>
                        </ul>
                    </div>
                    <div v-for="(resul, index) in Nresul" :key="index">
                        {{ resul.name }}
                        <select name="" id="" >
                            <option v-for="(resul2, index) in resul.data" :key="index" :value="resul2.data">{{ resul2.data }}</option>
                        </select>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'ProductCombinationComponent',
    data(){
        return{
            combinations:[
                {color:"Rojo", hexa:"#E84C3D", data:["XS","S"]},
                {color:"Azul", hexa:"#5897fb", data:["XS","S","M"]},
                {color:"Negro", hexa:"#000000", data:["XS","S","M","L"]},
                {color:"Amarillo", hexa:"#F1C40F",data:["XS","S","M"]},
                {color:"Camel", hexa:"#C19A6B",data:["XS","S"]},
            ],
            resulColores:[],
            resulCombination:[],
           
            Nresul:[],
        }
    },
    props:['productid'],
    methods:{
         /** Filtramos el array para obtener los colores sin repetir */
        findCombination(item){
            const resulFilterColor =  Object.values(this.combinations.reduce((prev,next)=>Object.assign(prev,{[next.color]:next}),{}))
            resulFilterColor.forEach(data => {
                this.resulColores.push({
                    color:data.color
                });
            });
            console.log(this.resulColores);
        },
        fillSize(color){
            //const resul =  this.combinations.filter(item => item.color === color).map( item => ({ size:item.size, dimensión:item.dimension}));
            let resul =  this.combinations.filter(item => item.color === color);
            
            let groups = {};
            for (var i = 0; i < resul.length; i++) {
                var groupName = resul[i].color;
                if (!groups[groupName]) {
                    groups[groupName] = [];
                }
                groups[groupName].push(resul[i]);
            }
     
            resul = [];
            for (var groupName in groups) {
                resul.push({group: groupName, color: groups[groupName]});
            }
            let new_array = [];
            resul.forEach(data => {
                let d = data.color;
                d.forEach(da=>{
                   for(var i in da)
                      new_array.push({name:i, data:da[i]});  
                })
            })
            this.groupArray(new_array);
        },
        groupArray(array){
            let groups = {};
            for (var i = 0; i < array.length; i++) {
                var groupName = array[i].name;
                if (!groups[groupName]) {
                    groups[groupName] = [];
                }
                groups[groupName].push(array[i]);
            }
           let  arrs = [];
            for (var groupName in groups) {
                arrs.push({name: groupName, data: groups[groupName]});
            }
           this.Nresul = arrs.filter(item => item.name !== 'color');
        },
        
        
    }
}
</script>
-->