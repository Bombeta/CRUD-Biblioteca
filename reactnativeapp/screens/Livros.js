import React, {useState, useEffect} from 'react';
import {View, Text, FlatList, SafeAreaView} from 'react-native';
import axios from "axios";
import { style } from '../assets/css/Css'



export default function Livros(){
    
    const [livros,setLivros] = useState([]);
    const [ativo,setAtivo] = useState(false);
  
    const ativar = () => { setAtivo(!ativo) }
  
    useEffect(()=>{
      async function getAllLivros(){
        try {
          const livro  = await axios.get('http://127.0.0.1:8000/api/livros/');
          console.log(livro.data.list);
          setLivros(livro.data.list);
        }catch (error){
          console.log(error)  
        }
      }
  
      getAllLivros()
    }, [])
    
    return (
        <View >         
        
            {livros.map((livro, key) => (
                <View style={style.item} key={livro.id}>
                    <Text style={style.itemText}>{livro.titulo}</Text>
                </View>
            ))}
            
        </View>
    );
}