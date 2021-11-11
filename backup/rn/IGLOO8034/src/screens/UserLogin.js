import React, { Component } from 'react';
import { View, TextInput, Text, Button, Alert, StyleSheet, Image } from 'react-native';

class UserLogin extends Component {

    static navigationOptions = {
        header: null
    }

    state = { username: "", password: "" }

    checkLogin() {
        const { username, password } = this.state;

        // fetch('http://192.168.100.83/iglooapp/user-login', { method: 'POST', body: JSON.stringify({username,password})})
        fetch('http://202.51.177.67:8034/iglooapp/user-login', { method: 'POST', body: JSON.stringify({username,password})})
        .then(res => {
            return res.text()
        })
        .then(res => {
            if(res === '1') {
                this.props.navigation.navigate('UserDatePicker')
            } else {
                Alert.alert('Error', 'Username/Password mismatch', [{
                    text: 'CLOSE'
                }])
            }
        })
        
    }

    render() {
        return (
            <View style={styles.parent}>
                <View style={{justifyContent: 'center', alignItems: 'center'}} >
                    <Image source={require('./img/igloo.jpg')} />
                </View>
                <Text style={styles.heading}>User Login into the App</Text>
                <TextInput style={styles.input} placeholder="Username" onChangeText={ text => this.setState({ username: text })}/>
                <TextInput style={styles.input} secureTextEntry={true} placeholder="Password" onChangeText={ text => this.setState({password: text}) } />
                <View style={{margin:10}}>
                    <Button title={"Login"} onPress={_ => this.checkLogin() }/>
                </View>
            </View>
        )
    }
}

export default UserLogin

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