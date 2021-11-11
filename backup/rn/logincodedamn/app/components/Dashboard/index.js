// import React, { Component } from 'react';
// import { View, Text, Button } from 'react-native';
// import { createStackNavigator, createAppContainer } from 'react-navigation';

// class Dashboard extends Component {

//     static navigationOptions = {
//         header: null
//     }
    
//     render() {
//         return (
//             <View>
//                 <Text>Dashboard</Text>
//                 <Button
//                   title="Go to Details"
//                   onPress={() => this.props.navigation.navigate('Home')}
//                 />
//             </View>
//         )
//     }
// }

// export default Dashboard




import React, { Component } from 'react';
import { AppRegistry, StyleSheet, Text, View, FlatList, Button } from 'react-native';
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

      FunctionToOpenSecondActivity = () =>
  {
     this.props.navigation.navigate('Second');
     
  }
    
      componentDidMount() {
        this.timer = setInterval(() => this.getAlertWeb(), 1000);
      }
    
      async getAlertWeb() {
        return fetch("http://192.168.100.83/laravel-test/tasks")
          .then(response => response.json())
          .then(responseJson => {     
            this.setState({
              tasks: responseJson.tasks,
              c_tasks: responseJson.c_tasks
            }, function() {
              //comment
            });
          })
          .catch(error => {
            null;
          });
      }

//     static navigationOptions = {
//         header: null
//     }
  render() {
    return (
    //   <View>
    //     <Text style={styles.red}>just red</Text>
    //     <Text>just bigBlue</Text>
    //     <Text style={[styles.bigBlue, styles.red]}>bigBlue, then red</Text>
    //     <Text style={[styles.red, styles.bigBlue]}>red, then bigBlue</Text>
    //   </View>

      <View style={styles.container}>
      <Button
          title="Add Task Form"
          onPress={() => this.props.navigation.navigate('Dashboard')}
        />


      <FlatList
        // data={[
        //   {key: 'Devin'},
        //   {key: 'Jackson'},
        //   {key: 'James'},
        //   {key: 'Joel'},
        //   {key: 'John'},
        //   {key: 'Jillian'},
        //   {key: 'Jimmy'},
        //   {key: 'Julie'},
        // ]}
        data = {this.state.tasks}
        renderItem={({item}) => <Text style={styles.item}>{item.task}</Text>}
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

  