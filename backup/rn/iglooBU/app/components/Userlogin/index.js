import React, { Component } from 'react';
import { View, TextInput, Text, Button, Alert, StyleSheet } from 'react-native';

class Home extends Component {

    static navigationOptions = {
        header: null
    }

    state = { username: "", password: "" }

    checkLogin() {
        const { username, password } = this.state;
        //console.warn(username, password)

        // if(username == 'admin' && password == 'admin') {
        //     this.props.navigation.navigate('dashboard')
        // } else {
        //     Alert.alert('Error', 'Username/Password mismatch', [{
        //         text: 'Okey'
        //     }])
        // }

        fetch('http://192.168.100.83/laravel-test2/login-test', { method: 'POST', body: JSON.stringify({username,password})})
        .then(res => {
            return res.text()
        })
        //.then(res => console.warn(res))
        .then(res => {
            if(res === '1') {
            // if(res == 'ok') {    //error
                this.props.navigation.navigate('dashboard')
            } else {
                Alert.alert('Error', 'Username/Password mismatch', [{
                    text: 'Okey'
                }])
            }
        })
        
    }

    render() {
        // const { heading, input, parent } = styles
        return (
            <View style={styles.parent}>
                <View style={{justifyContent: 'center', alignItems: 'center'}} >
                    {/* <Image 
                        
                        source={require('./igloo.jpg')} 
                    /> */}
                </View>
                <Text style={styles.heading}>User Login into the App</Text>
                <TextInput style={styles.input} placeholder="Username" onChangeText={ text => this.setState({ username: text })}/>
                <TextInput style={styles.input} secureTextEntry={true} placeholder="Password" onChangeText={ text => this.setState({password: text}) } />

                <Button title={"Login"} onPress={_ => this.checkLogin() }/>

                
                
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