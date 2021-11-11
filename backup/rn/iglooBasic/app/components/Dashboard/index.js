
import React, { Component } from 'react';
import { AppRegistry, StyleSheet, Text, View, FlatList, Button, Alert  } from 'react-native';
import { createStackNavigator, createAppContainer } from 'react-navigation';


export default class Dashboard extends Component {

    constructor(props) {
        super(props);
        this.state = {
          task: null,
          tasks: [],
          c_tasks: [],
        };
      }

  //     FunctionToOpenSecondActivity = () =>
  // {
  //    this.props.navigation.navigate('Second');
     
  // }

    renderSeparator = () => {  
        return (  
            <View  
                style={{  
                    height: 1,  
                    width: "100%",  
                    backgroundColor: "#000",  
                }}  
            />  
        );  
    };  
    //handling onPress action  
    getListViewItem = (item) => {  
        Alert.alert(JSON.stringify(item.id));  
        this.props.navigation.navigate('test', {
          JSON_ListView_Clicked_Item: JSON.stringify(item.id),
        })
    }  


    
      componentDidMount() {
        this.timer = setInterval(() => this.getAlertWeb(), 1000);
      }
    
      async getAlertWeb() {
        return fetch("http://192.168.100.83/laravel-test2/ticket")
          .then(response => response.json())
          .then(responseJson => {     
            this.setState({
                tickets: responseJson.tickets
            }, function() {
              //comment
            });
          })
          .catch(error => {
            null;
          });
      }

    static navigationOptions = {
        header: null
    }
  render() {
    return (
    //   <View>
    //     <Text style={styles.red}>just red</Text>
    //     <Text>just bigBlue</Text>
    //     <Text style={[styles.bigBlue, styles.red]}>bigBlue, then red</Text>
    //     <Text style={[styles.red, styles.bigBlue]}>red, then bigBlue</Text>
    //   </View>

      <View style={styles.container}>
      {/* <Button
          title="Add Task Form"
          onPress={() => this.props.navigation.navigate('Dashboard')}
        /> */}


        <Button
          title="Go to Home"
          onPress={() => this.props.navigation.navigate('home')}
        />


      <FlatList
        data = {this.state.tickets}
        renderItem={({item}) =>  
                        <Text style={styles.item}  
                              onPress={this.getListViewItem.bind(this, item)}>{item.id}</Text>}  
                    ItemSeparatorComponent={this.renderSeparator}
      />
    </View>
    );
  }
}

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

  