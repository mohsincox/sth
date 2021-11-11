
import { createStackNavigator, createAppContainer } from 'react-navigation';
import Home from './app/components/Home';
import Dashboard from './app/components/Dashboard';

const AppNavigator = createStackNavigator({
  Home: { screen: Home },
  Dashboard: { screen: Dashboard }
});

export default createAppContainer(AppNavigator);