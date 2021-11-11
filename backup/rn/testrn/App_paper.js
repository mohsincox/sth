import * as React from 'react';
import { View } from 'react-native';
import { Button, Card, Title, Paragraph, Text, Appbar} from 'react-native-paper';

const MyComponent = () => (
    <View>
        <Appbar >
        <Appbar.Action icon="archive" onPress={() => console.log('Pressed archive')} />
        <Appbar.Action icon="mail" onPress={() => console.log('Pressed mail')} />
        <Appbar.Action icon="label" onPress={() => console.log('Pressed label')} />
        <Appbar.Action icon="delete" onPress={() => console.log('Pressed delete')} />
      </Appbar>
      {/* <Avatar.Icon size={24} icon="folder" /> */}
      
  <Card>
    <Card.Content>
      <Title>Card title</Title>
      <Paragraph>Card content</Paragraph>
    </Card.Content>
    <Card.Cover source={{ uri: 'https://picsum.photos/700' }} />
    <Card.Actions>
      <Button>Cancel</Button>
      <Button>Ok</Button>
    </Card.Actions>
  </Card>
  <Text>Testing</Text>

  </View>
);

export default MyComponent;