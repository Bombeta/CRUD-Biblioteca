import { StatusBar } from 'expo-status-bar';
import { style } from './assets/css/Css'
import Page from './views/Page';

import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

//import { StyleSheet } from 'react-native';
import {View, Text, Button} from 'react-native'
//import axios from "axios";
//import { useState, useEffect } from 'react';

export default function App() {

  //const [students,setStudents] = useState([]);

  // useEffect(()=>{
  //   async function getAllStudent(){
  //     try {
  //       const students  = await axios.get('');
  //       console.log(students.data);
  //       setStudents(students.data);
  //     }catch (error){
  //       console.log(error)  
  //     }
  //   }
  // }, [])

  return (
    <View style={style.container}>
      <Text style={style.h2}>Open up App.js to start working on your app!</Text>
      <Page />
      <Button title='Todos os livros'></Button>
      <StatusBar style="auto" />
    </View>
  );
}

// const style = StyleSheet.create({
//   container: {
//       flex: 1,
//       backgroundColor: '#000',
//       alignItems: 'center',
//       justifyContent: 'center',
//   },
//   h2: {
//     color: '#fff',
//     fontSize: 20,
//   }
// });
