import React, { Component } from 'react';
import { View, Text, Button, FlatList, StyleSheet, Alert, TextInput, Keyboard, Picker } from 'react-native';

export class Test extends Component {

  constructor(props) {
    super(props);
    this.state = {
      tickets: null,
    //   id : 'Test'
        isLoading: true,
        remarks : ''
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
          ticket: responseJson.ticket,
          dataSource: responseJson.deliveryStatuses,
          ticketDetails: responseJson.ticketDetails,
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

    // no keyboard
    // Keyboard.dismiss();
    // this.textInput.clear()

    this.props.navigation.navigate('dashboard')
    
}




  render() {
    return (
      <View>
        {/* <Text>{this.props.navigation.state.params.JSON_ListView_Clicked_Item
            ? this.props.navigation.state.params.JSON_ListView_Clicked_Item
            : 'No Value Passed'}</Text> */}
        
        <FlatList
          data = {this.state.ticket}
            renderItem={({item}) => 
                <View>
                <Text style={styles.item}>{item.id}. Sub: {item.subject}</Text>
                <Text style={{ padding: 2 }}>Name: {item.customer_name}</Text>
                <Text style={{ padding: 2 }}>Mobile: {item.phone_number}</Text>
                <Text style={{ padding: 2 }}>Address: {item.customer_address}</Text>
                <Text style={{ padding: 2 }}>Product: {item.product_model}</Text>
                {/* <Picker
                    selectedValue={this.state.language}
                    style={{height: 50, width: 100}}
                    onValueChange={(itemValue, itemIndex) =>
                        this.setState({language: itemValue})
                    }>
                    <Picker.Item label="Java" value="java" />
                    <Picker.Item label="JS" value="js" />
                </Picker> */}

<Picker
            selectedValue={this.state.remarks}

            onValueChange={(itemValue, itemIndex) => this.setState({remarks: itemValue})} >
                <Picker.Item label='Please select an option...' value='' />
            { this.state.dataSource.map((item, key)=>(
            <Picker.Item label={item.name} value={item.name} key={key} />)
            )}
    
          </Picker>


                {/* <TextInput  placeholder="Remarks" ref={input => { this.textInput = input }} onChangeText={ text => this.setState({ remarks: text })}/> */}
                <Button title={"Submit"} onPress={_ => this.checkLogin(item.id) }/>
                </View>
                
        
        } keyExtractor={(item, index) => index.toString()}
        />



<FlatList style={{ marginTop: 10 }}
          data = {this.state.ticketDetails}
            renderItem={({item}) => 
                <View>
                    {/* <Text style={styles.item}>{item.id} Sub {item.remarks}</Text> */}
                    <Text style={{ padding: 1 }}>{item.created_at}: {item.remarks}</Text>
                </View>
                
        
        } keyExtractor={(item, index) => index.toString()}
        />

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