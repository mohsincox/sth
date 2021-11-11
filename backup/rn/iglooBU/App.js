/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 * @flow
 */

import React, {Component} from 'react';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import Home from './app/components/Home';
import Dashboard from './app/components/Dashboard';
import Test from './app/components/Test';
import Ticket from './app/components/Ticket';
import Userlogin from './app/components/Userlogin';
import AdminLogin from './app/components/AdminLogin';
import AdminDatePicker from './app/components/AdminDatePicker';
import AdminTicket from './app/components/AdminTicket';
import AdminEdit from './app/components/AdminEdit';

const RootStack = createStackNavigator(
    {
      home: Home,
      dashboard: Dashboard,
      test: Test,
      ticket: Ticket,
      userlogin: Userlogin,
      adminLogin: AdminLogin,
      adminDatePicker: AdminDatePicker,
      adminTicket: AdminTicket,
      adminEdit: AdminEdit,
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