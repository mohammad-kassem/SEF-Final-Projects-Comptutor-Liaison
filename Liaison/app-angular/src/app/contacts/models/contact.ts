export interface IContact {
  _id: string;
  name: string;
  email: string;
  phone: string;
  relationship: string;
  location: any;
  country: string;
  user: any;
  liker?: any;
  messages?: any[];
}