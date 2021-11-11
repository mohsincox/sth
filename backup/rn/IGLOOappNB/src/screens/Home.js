import React, { Component } from 'react';
import { Image } from 'react-native';
import { Container, Header, Content, Card, CardItem, Thumbnail, Text, Button, Icon, Left, Body, Right, Title, Footer, FooterTab } from 'native-base';

class Home extends Component {

    static navigationOptions = {
        header: null
    }

    render() {
        console.disableYellowBox = true;
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
                        <CardItem cardBody>
                            <Image source={require('./img/igloo_bg.jpg')} style={{height: 220, width: null, flex: 1}}/>
                        </CardItem>
                        <CardItem>
                            <Left>
                                <Button primary onPress={() => this.props.navigation.navigate('AdminLogin')}><Icon name='person' /><Text>Admin Login</Text></Button>
                            </Left>
                            <Right>
                                <Button primary onPress={() => this.props.navigation.navigate('UserLogin')}><Text>User Login</Text><Icon name='person' /></Button>
                            </Right>
                        </CardItem>
                    </Card>
                </Content>
                <Footer>
                    <FooterTab>
                        <Button vertical active onPress={() => this.props.navigation.navigate('AdminLogin')}>
                            <Icon active name="person" />
                            <Text>Admin Login</Text>
                        </Button>
                        <Button vertical active onPress={() => this.props.navigation.navigate('UserLogin')} >
                            <Icon name="person" />
                            <Text>User Login</Text>
                        </Button>
                    </FooterTab>
                </Footer>
            </Container>
        );
    }
}

export default Home