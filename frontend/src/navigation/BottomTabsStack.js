import React from 'react'
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator }  from '@react-navigation/bottom-tabs';
import HomeScreen from "../screens/HomeScreen";
import LoginScreen from '../screens/LoginScreen';
import Icon from 'react-native-vector-icons/FontAwesome';
import HomeStack from './HomeStack';




export default function BottomTabsStack() {
    const Tab = createBottomTabNavigator();
    return (
      <NavigationContainer>
      <Tab.Navigator>
        <Tab.Screen options={{
          tabBarIcon: () => {
            return <Icon name="home" size={24} color={"#1877F2"}/>;
          },
          tabBarShowLabel: false,
          tabBarStyle: { height: 56 },
          headerShown: false
        }} name="Home" component={HomeStack} />
      </Tab.Navigator>
    </NavigationContainer>
      );
}