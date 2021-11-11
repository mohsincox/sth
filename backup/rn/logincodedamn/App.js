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

const RootStack = createStackNavigator(
    {
      home: Home,
      dashboard: Dashboard
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