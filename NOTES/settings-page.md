# Settings page notes

## 1. Profile Settings

### **Purpose**: Basic user information and what appears on their profile.

| Field           | Type         | Notes                                           |
| --------------- | ------------ | ----------------------------------------------- |
| Profile Picture | Image Upload | Reuse UM's existing avatar if possible          |
| Display Name    | Text         | Public name                                     |
| Company         | Text         | Brand name for the sponsors                     |
| Website         | Url          | Optional                                        |
| Bio             | Textarea     | Small section (intro or mission statement)      |
| Location        | Text         | Might add location services for searching later |
| Social Links    | URLs         | LinkedIn, Instagram, etc.                       |

## 2. Account and Security

### **Purpose**: Manage account access and privacy.

| Field                 | Type                     | Notes                                                                    |
| --------------------- | ------------------------ | ------------------------------------------------------------------------ |
| Email Address         | Text                     | Use the account email, might add functionality to change the email later |
| Change Password       | IDK WHAT TYPE TO USE     | Might hook into UM's password stuff, depends on if we ditch UM           |
| Logout of all Devices | Button                   | Self-explanatory                                                         |
| Delete Account        | Button **(DANGER ZONE)** | Confirm with modal                                                       |

## 3. Notifications and Communication (later)

### **Purpose**: Control which updates are send to the user via email, phone or in-dashboard notifications.

| Field                            | Type   | Notes                                                                         |
| -------------------------------- | ------ | ----------------------------------------------------------------------------- |
| Sponsorship Request Notification | Toggle | When a new request comes in                                                   |
| Negotiation Updates              | Toggle | Status changes or messages                                                    |
| Event Approvals                  | Toggle | When an event is approved/deciled (if we decide to add manual event approval) |
| Message Alerts                   | Toggle | New DM (when we add chat support)                                             |
| Marketing and Announcements      | Toggle | Newsletters (if we ever add that)                                             |
| Notification Frequency           | Select | Instant/Daily Digest/Weekly                                                   |

## 4. Sponsorship Preferences (for sponsors only)

### **Purpose**: Filtering for sponsors and help the algorithm.

| Field                        | Type                       | Notes                           |
| ---------------------------- | -------------------------- | ------------------------------- |
| Sponsorship Categories       | Multi-Select               | e.g. Tech, Gaming, Sports       |
| Budget Range                 | Range slider or two inputs | Min-Max preffered for budget    |
| Preferred Event Types        | Multi-Select               | Online/Physical/Hybrid          |
| Preferred Locations          | Multi-Select               | Regions (or countries later 😉) |
| Auto-approve Small Proposals | Toggle                     | Optional automation             |
| Visibility                   | Toggle                     | Appear in public searches       |

## 5. Event Organizer Preferences (for event organizers only)

### **Purpose**: Simpler proposal management and event targeting. **This thing needs rework!!!**

| Field                     | Type         | Notes                             |
| ------------------------- | ------------ | --------------------------------- |
| Event Category            | Select       | e.g. Music, Tech                  |
| Audience Size             | Number       | Approximate average               |
| Event Frequency           | Select       | One-time/Monthly/Yearly           |
| Sponsorship Needs         | Multi-select | Monetary/Product/Promotion        |
| Default Proposal Template | Textarea     | Auto-filled message base          |
| Allow Direct Contant      | Toggle       | Sponsors can message you directly |

## 6. Appearance and Interface

### **Purpose**: Personalize the dashboard experience.

| Field                 | Type         | Notes                                                                   |
| --------------------- | ------------ | ----------------------------------------------------------------------- |
| Dark Mode             | Toggle       | Store in user meta or localStorage (might add cookies and match device) |
| Dashboard Layout      | Select       | Compact/Detailed                                                        |
| Accent Color          | Color Picker | Optional - custom color or match branding                               |
| Default Page on Login | Select       | Overview/Negotiations etc.                                              |

## 7. Data and Privacy

### **Purpose**: Make sure we are legally covered and have control over data

| Field              | Type   | Notes                                           |
| ------------------ | ------ | ----------------------------------------------- |
| Export My Data     | Button | GDPR compliance                                 |
| Delete My Account  | Button | Duplicate from security tab or add confirmation |
| Allow Data Sharing | Toggle | Analytics or anonymized stats                   |
