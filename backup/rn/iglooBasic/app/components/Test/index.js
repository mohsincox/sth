import React, { Component } from 'react';
import { View, Text, Button, FlatList, StyleSheet, Alert, TextInput, Keyboard } from 'react-native';

export class Test extends Component {

	constructor(props) {
    super(props);
    this.state = {
      tickets: null,
    //   id : 'Test'
    };
    
  }

  componentDidMount() {
    this.timer = setInterval(() => this.getAlertWeb(), 1000);
  }

  async getAlertWeb() {
    return fetch(`http://192.168.100.83/laravel-test2/ticketa/${this.props.navigation.state.params.JSON_ListView_Clicked_Item}`)
    // return fetch(`http://192.168.100.83/laravel-test2/ticketa`)
      .then(response => response.json())
      .then(responseJson => {     
        this.setState({
          // tickets: responseJson.tickets,
          tickets: responseJson.tickets,
          
        }, function() {
          //comment
        });
      })
      .catch(error => {
        null;
      });
  }


  checkLogin(tt) {
    const { remarks } = this.state;
    // console.warn(tt)
    // console.warm(remarks)

    // if(username == 'admin' && password == 'admin') {
    //     this.props.navigation.navigate('dashboard')
    // } else {
    //     Alert.alert('Error', 'Username/Password mismatch', [{
    //         text: 'Okey'
    //     }])
    // }
    fetch('http://192.168.100.83/laravel-test2/remarks', {
      method: 'POST',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
          "ticket_id": tt,
        "remarks": this.state.remarks,

       }),
    })
    .then((response) => response.json())
    .then((responseData) => {
            "POST Response",
            "Response Body -> " + JSON.stringify(responseData)
    })
    .done();   
    // this.input._root.clear();
    Keyboard.dismiss();
    this.textInput.clear()

    this.props.navigation.navigate('dashboard')
    
}




  render() {
    return (
      <View>
        <Text>{this.props.navigation.state.params.JSON_ListView_Clicked_Item
            ? this.props.navigation.state.params.JSON_ListView_Clicked_Item
            : 'No Value Passed'}</Text>
        {/* <Button onPress={() => this.props.navigation.navigate('home')} title="Home"/> */}
      	
      	<FlatList
        	data = {this.state.tickets}
            renderItem={({item}) => 
                <View>
                <Text style={styles.item}>{item.id} Sub {item.subject}</Text>
                <Text>{item.subject}</Text>
                <TextInput  placeholder="Remarks" ref={input => { this.textInput = input }} onChangeText={ text => this.setState({ remarks: text })}/>
                <Button title={"Submit"} onPress={_ => this.checkLogin(item.id) }/>
                </View>
                
        
        }
      	/>

      	{/* <Text>{this.state.tickets.subject}</Text> */}

      </View>
    )
  }
};

export default Test;


const styles = StyleSheet.create({
    container: {
     flex: 1,
     paddingTop: 22
    },
    item: {
      padding: 10,
      fontSize: 18,
      height: 44,
    },
  })