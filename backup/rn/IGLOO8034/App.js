import React, { Component } from 'react';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import Home from './src/screens/Home';
import AdminLogin from './src/screens/AdminLogin';
import AdminDatePicker from './src/screens/AdminDatePicker';
import AdminTicket from './src/screens/AdminTicket';
import AdminEdit from './src/screens/AdminEdit';
import UserLogin from './src/screens/UserLogin';
import UserDatePicker from './src/screens/UserDatePicker';
import UserTicket from './src/screens/UserTicket';
import UserEdit from './src/screens/UserEdit';

const AppNavigator = createStackNavigator({
    Home: { screen: Home },
    AdminLogin: { screen: AdminLogin },
    AdminDatePicker: { screen: AdminDatePicker },
    AdminTicket: { screen: AdminTicket },
    AdminEdit: { screen: AdminEdit },
    UserLogin: { screen: UserLogin },
    UserDatePicker: { screen: UserDatePicker },
    UserTicket: { screen: UserTicket },
    UserEdit: { screen: UserEdit },
},
{
    initialRouteName: 'Home',
});

const AppContainer = createAppContainer(AppNavigator);

export default class App extends Component {
    render() {
        return (
            <AppContainer />
        );
    }
}


/*
import React, {Component} from 'react';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import Home from './src/screens/Home';
// import Dashboard from './app/components/Dashboard';
// import Test from './app/components/Test';
// import Ticket from './app/components/Ticket';
// import Userlogin from './app/components/Userlogin';
// import AdminLogin from './app/components/AdminLogin';
// import AdminDatePicker from './app/components/AdminDatePicker';
// import AdminTicket from './app/components/AdminTicket';
// import AdminEdit from './app/components/AdminEdit';

const RootStack = createStackNavigator(
    {
      home: Home,
    //   dashboard: Dashboard,
    //   test: Test,
    //   ticket: Ticket,
    //   userlogin: Userlogin,
    //   adminLogin: AdminLogin,
    //   adminDatePicker: AdminDatePicker,
    //   adminTicket: AdminTicket,
    //   adminEdit: AdminEdit,
    },
    {
      initialRouteName: 'home',
    }
  );
  const AppContainer = createAppContainer(RootStack);

export default class App extends Component {
  render() {
    return <AppContainer />;
  }
}


*/