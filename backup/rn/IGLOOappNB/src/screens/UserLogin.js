import React, { Component } from 'react';
import {Alert, Image, View } from 'react-native';
import { Container, Header, Content, Form, Item, Input, Label, Button, Text, H1, Card, CardItem, Footer, Thumbnail, Left, Right, Body, Title } from 'native-base';

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
            <Container>
                <Header>
                    <Left/>
                        <Body style={{  flex: 1,  justifyContent: 'center', alignItems: 'center' }}>
                            <Title>IGLOO</Title>
                        </Body>
                    <Right />
                </Header>
                <Content>
                    <Card>
                        <CardItem>
                            <Left>
                                <Thumbnail source={require('./img/igloo.jpg')} />
                                <Body>
                                    <Text>IGLOO</Text>
                                    <Text note style={{ fontStyle: 'italic' }}>A world of Great Taste!!</Text>
                                </Body>
                            </Left>
                        </CardItem>
                        
                            
                        <View style={{ justifyContent: 'center', alignItems: 'center' }} >
                            <Image source={require('./img/igloo.jpg')} />
                            <H1>User Login into App</H1>
                        </View>
                        <Form>
                            <Item floatingLabel>
                                <Label>Username</Label>
                                <Input onChangeText={ text => this.setState({ username: text })}/>
                            </Item>
                            <Item floatingLabel last>
                                <Label>Password</Label>
                                <Input secureTextEntry={true} onChangeText={ text => this.setState({password: text}) } />
                            </Item>
                            <Button style={{margin:10}} primary block rounded  onPress={_ => this.checkLogin() }><Text>User Login</Text></Button>
                        </Form>
                      
                    </Card>
                </Content>
                <Footer />
            </Container>
        );
    }
}

export default UserLogin
