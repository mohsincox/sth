import React, { Component } from 'react';
import { View, Text, Button, Image, StyleSheet } from 'react-native';

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
                        source={require('./img/igloo.jpg')} 
                    />
                </View>
                <Text style={styles.heading}>Admin Login</Text>
                <View style={{margin:10}}>
                    <Button title="Admin Login" onPress={() => this.props.navigation.navigate('AdminLogin')} />
                </View>
                <Text style={styles.heading}>User Login</Text>
                <View style={{margin:10}}>
                    <Button title="User Login" color='green' onPress={() => this.props.navigation.navigate('UserLogin')} />
                </View>
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