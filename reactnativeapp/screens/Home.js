import React from 'react';
import { StatusBar } from 'expo-status-bar';
import { style } from '../assets/css/Css'
import {View, Text, Button} from 'react-native'


export default function Home({navigation}){
    return (
        <View>  
            <View style={style.button}>
                <Button onPress={()=>navigation.navigate("Livros")} title='Todos os livros'></Button>
            </View>            
            <StatusBar style="auto" />
      </View>
    );
}