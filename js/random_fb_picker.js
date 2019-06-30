/**
 * Concept
 * ============
 * I need to select some users randomly from a given list, where these users
 * have to have done some actions. For example, given a certain Facebook post,
 * they have to: shared it and/or liked it and/or commented on it.
 *
 * Task:
 * Print all user names that shared a given Facebook post.
 * AC: Run it directly using the browser console.
 */
(() => {
  "use strict";

  class User {
    constructor(name, href) {
      this.name = name;
      this.href = href;
    }
  }

  class UserList {
    constructor(users) {
      this.users = users || [];
    }
    add(user) {
      if (!this.exists(user)) {
        this.users.push(user);
      }
    }
    exists(user) {
      let exists = false;
      this.users.forEach(currentUser => {
        if (currentUser.name === user.name) {
          exists = true;
        }
      });
      return exists;
    }
    all() {
      return this.users;
    }
    total() {
      return this.users.length;
    }
    getByIndex(i) {
      return this.users[i];
    }
  }

  function crawlUserList(selector, { nameAttrName, hrefAttrName }) {
    const users = new UserList();
    document.querySelectorAll(selector).forEach(function(el) {
      function getHref(el) {
        const href = el.getAttribute(hrefAttrName);
        const parsedHref = href.substring(0, href.indexOf("?"));
        if (parsedHref.endsWith("profile.php")) {
          // ignore the users that doesn't have a custom url
          return;
        }
        return parsedHref;
      }
      const userName = el.getAttribute(nameAttrName);
      const href = getHref(el);
      if (userName && href) {
        users.add(new User(userName, href));
      }
    });
    return users;
  }

  function printUserNames(users) {
    users.all().forEach((user, index) => {
      const { name, href } = user;
      console.log(`index:${index}, name:${name}, href:${href}`);
    });
  }

  function findRandomUsers(users, total, maxTries = 1000) {
    const randomUsers = new UserList();
    let tries = 0;
    while (randomUsers.total() < total) {
      if (tries > maxTries) {
        console.log("Emergency exit due to a reached limit!");
        break;
      }
      let randomUser = users.getByIndex(
        Math.floor(Math.random() * users.total())
      );
      if (randomUser && !randomUsers.exists(randomUser)) {
        randomUsers.add(randomUser);
      }
      tries++;
    }
    return randomUsers;
  }

  const sharedSelector = "#repost_view_dialog > div div.clearfix a.profileLink";
  const attributes = { nameAttrName: "title", hrefAttrName: "href" };
  const usersThatSharedThePost = crawlUserList(sharedSelector, attributes);

  console.log("Total users");
  printUserNames(usersThatSharedThePost);
  console.log(`Random users`);
  const randomUsers = findRandomUsers(usersThatSharedThePost, 5);
  printUserNames(randomUsers);
  console.table(randomUsers.all());
})();
