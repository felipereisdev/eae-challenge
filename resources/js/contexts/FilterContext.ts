import { createContext } from 'react';
import { Filter } from '../interfaces/Filter';

interface FilterContextProps {
  filters: Filter[];
  handleSetFilters: (filtersData: Filter[], filter?: Filter) => void;
}

export const FilterContext = createContext<FilterContextProps>(
  {} as FilterContextProps
);
