import React, { HTMLAttributes, useContext } from 'react';
import { FaTimes } from 'react-icons/fa';

import { FilterContext } from '../contexts/FilterContext';

interface TechProps extends HTMLAttributes<HTMLDivElement> {
  title: string;
  filter?: boolean;
}

export function Tech({ title, filter = false, ...rest }: TechProps) {
  const { filters, handleSetFilters } = useContext(FilterContext);

  function handleDeleteFilter(title: string) {
    const newFilters = filters.filter((filter) => filter.name !== title);

    handleSetFilters(newFilters);
  }

  return (
    <div className="flex cursor-pointer" {...rest}>
      <span
        className={`px-2 py-1 ${
          filter ? 'rounded-l-sm' : 'rounded-sm'
        } text-sm font-bold text-header bg-gray-200`}
      >
        {title}
      </span>
      {filter && (
        <span
          className="rounded-r-sm bg-gray-200 text-header flex items-center hover:bg-header hover:text-white cursor-pointer"
          onClick={() => handleDeleteFilter(title)}
        >
          <FaTimes size={25} />
        </span>
      )}
    </div>
  );
}
