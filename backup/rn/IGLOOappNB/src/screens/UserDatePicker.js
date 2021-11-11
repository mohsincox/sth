import React, { Component } from 'react'
import DatePicker from 'react-native-datepicker'
import { Container, Header, Content, Button, Text, Card, CardItem, Thumbnail, Body, Footer, Left, Right, Icon, Title, FooterTab } from 'native-base';

class UserDatePicker extends Component {
    static navigationOptions = {
        header: null
    }
    constructor(props) {
    super(props)
    var month = new Date().getMonth() + 1;
    this.state = {date: new Date().getFullYear()+"-"+month+"-"+new Date().getDate()}
    // console.log(this.state)
    }

    listShow() {
        this.props.navigation.navigate('UserTicket', {
            requestDate: this.state.date,
        })
    }

    render(){
        console.disableYellowBox = true;
        return (
            <Container>
                <Header>
                    <Left />
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
                        <CardItem header>
                            <Text>Date wise Ticket Form</Text>
                        </CardItem>
                        <CardItem>
                            <Body>
                                <DatePicker
                                    style={{width: 300, marginLeft: 40}}
                                    date={this.state.date}
                                    mode="date"
                                    placeholder="select date"
                                    format="YYYY-MM-DD"
                                    // minDate="2016-05-01"
                                    // maxDate="2016-06-01"
                                    confirmBtnText="Confirm"
                                    cancelBtnText="Cancel"
                                    customStyles={{
                                    dateIcon: {
                                        position: 'absolute',
                                        left: 0,
                                        top: 4,
                                        marginLeft: 0
                                    },
                                    dateInput: {
                                        marginLeft: 36
                                    }
                                    // ... You can check the source to find the other keys.
                                    }}
                                    onDateChange={(date) => {this.setState({date: date})}}
                                />
                                <Button style={{margin:10}} primary block rounded  onPress={_ => this.listShow()} ><Text>Show Ticket</Text></Button>
                            </Body>
                        </CardItem>
                        <CardItem footer>
                            <Text>IGLOO</Text>
                        </CardItem>
                    </Card>
                </Content>
                <Footer>
                    <FooterTab>
                        <Button vertical>
                            <Icon name="apps" />
                            <Text>User Panel</Text>
                        </Button>
                        <Button vertical active onPress={() => this.props.navigation.navigate('Home')}>
                            <Icon active name="person" />
                            <Text>Logout</Text>
                        </Button>
                    </FooterTab>
                </Footer>
            </Container>
        );
    }
}

export default UserDatePicker