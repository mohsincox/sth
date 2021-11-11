import React, { Component } from 'react';
import { View, TextInput, Text, Button, Alert, Image, StyleSheet } from 'react-native';

class Home extends Component {

    static navigationOptions = {
        header: null
    }

    render() {
        // const { heading, input, parent } = styles
        return (
            <View style={styles.parent}>
                <View style={{justifyContent: 'center', alignItems: 'center'}} >
                    <Image 
                        source={require('./igloo.jpg')} 
                    />
                </View>
                <Text style={styles.heading}>Admin Login</Text>
                <Button
                    title="Admin Login"
                    onPress={() => this.props.navigation.navigate('adminLogin')}
                />
                
                <Text style={styles.heading}>User Login</Text>

                <Button
                    title="User Login"
                    onPress={() => this.props.navigation.navigate('userlogin')}
                />
            </View>
        )
    }
}

export default Home



const styles = StyleSheet.create({
    heading: {
        fontSize: 25,
        textAlign: 'center'
    },
    input: {
        marginLeft: 20,
        marginRight: 20
    },
    parent: {
        flex: 1,
        justifyContent: 'center'
    }
})