import 'package:flutter/material.dart';
import 'package:flutter_todos/posts/posts.dart';

class PostListItem extends StatelessWidget {
  const PostListItem({Key key, @required this.post}) : super(key: key);

  final Post post;

  @override
  Widget build(BuildContext context) {
    final textTheme = Theme.of(context).textTheme;
    return ListTile(
      leading: Text('${post.id}', style: textTheme.caption),
      // title: Text(post.title),
      title: Text(post.title ?? 'default'),
      isThreeLine: true,
      subtitle: Text(post.body),
      dense: true,
    );
  }
}
